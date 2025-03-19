<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Models\Business;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $people = Person::all();

        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $person = new Person();
        $locations = Location::allActivated();
        $businesses = Business::allActivated();
        $roles = Role::all();

        return view('person.create', compact('person', 'locations', 'businesses', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Recopilar detalles de la persona
            $detailsPerson = [
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'blood_group' => $request->blood_group,
                'language' => $request->language,
                'is_activated' => $request->is_activated,
                'person_statuses_id' => $request->person_statuses_id ?: 1, // Default to 1 if empty
            ];
            $detailsEmployee = [
                'business_employee_id' => $request->business_employee_id,
                'email_business' => $request->email_business,
                'jobTitle' => $request->jobTitle,
                'department' => $request->department,
                'role' => $request->employee_role,
                'salary' => $request->salary,
                'path_image' => $request->path_image,

            ];

            $detailsUser = [
                'name' => $request->username,
                'email' => $request->useremail,
                'password' => $request->password,
                'roleid' => $request->roleid
            ];

            // Recopilar detalles de contacto
            $detailsContact = [
                'email' => $request->email,
                'family_number' => $request->family_number,
                'alternate_number' => $request->alternate_number,
                'mobile' => $request->mobile,
                'phone' => $request->phone,
                'location_id' => null,
            ];
            $detailsContact['email'] = $request->validate([
                'email' => 'required|email|unique:contacts,email'
            ]);

            // Recopilar detalles de la ubicación
            $detailsLocation = [
                'name' => $request->location_name,
                'description' => $request->description,
                'zip_code' => $request->zip_code,
                'city' => $request->city,
                'address' => $request->address,
                'municipality_id' => $request->municipality_id,
                'landmark' => $request->landmark,
            ];


            $role = Role::find($detailsUser['roleid']);
            $detailsUser['role'] = $role->name;

            $user = User::create($detailsUser);
            // Verificar y crear ubicación
            $location = null;
            if ($request->has('location_name')) {
                $location = Location::where('name', $request->location_name)
                    ->where('zip_code', $request->zip_code)
                    ->where('address', $request->address)
                    ->where('municipality_id', $request->municipality_id)
                    ->first(); // Ahora usamos first() para obtener un solo registro.

                if (!$location) {
                    $location = Location::create($detailsLocation);
                }
            }

            // Asignar ID de ubicación al contacto si se creó o encontró
            if ($location) {
                $detailsContact['location_id'] = $location->id;
            }

            // Procesar contacto
            $contact = Contact::where('mobile', $request->mobile)->first();
            if (!$contact) {
                $contact = Contact::create($detailsContact);
            }
            $detailsPerson['contact_id'] = $contact->id;

            $detailsPerson['user_id'] = $user->id;
            $detailsPerson['is_activated'] = $request->input('is_activated') === 'on' ? 1 : 0;
            // Crear persona
            $person = Person::create($detailsPerson);

            // Procesar según el tipo
            switch ($request->type) {
                case 'Cliente':
                    $this->handleCustomer($request, $person, $contact);
                    break;
                case 'CEO':
                    $this->handleCEO($request, $person);
                    break;
                case 'Empleado':
                    $request->validate([
                        'path_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Tamaño máximo 2MB
                    ]);

                    // Manejo de la imagen
                    if ($request->hasFile('path_image')) {
                        $detailsEmployee['path_image'] = upload_image($request->file('path_image'));
                    }
                    $this->handleEmployee($detailsEmployee, $person);
                    break;
            }

            DB::commit();
            return Redirect::route('people.index')->with('success', 'Persona creada exitosamente.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return Redirect::route('people.create')->withErrors([
                'error' => 'No se ha podido añadir la persona. Por favor, inténtelo de nuevo más tarde.' . "-------" . $ex
            ]);
        }
    }

    private function handleCustomer($request, $person, $contact)
    {
        $billingAddressId = null;
        $shippingAddressId = null;

        if (isset($request->billingAddress) && isset($request->shippingAddress)) {
            // Implementar la lógica de manejo para 'Cliente'
            $billingAddressId = $this->processAddress($request->billingAddress, $contact);
            $shippingAddressId = $this->processAddress($request->shippingAddress, $contact);
        }
        // Crear relación con cliente
        $person->customer()->create([
            'billingAddress_id' => $billingAddressId,
            'shippingAddress_id' => $shippingAddressId,
        ]);
    }

    private function handleCEO($request, $person)
    {
        // Check if the business_employee_id is present in the request
        if ($request->has('business_employee_id')) {
            // Fetch the business using the provided business_employee_id
            $business = Business::find($request->business_employee_id);

            // Check if the business exists
            if (!$business) {
                return Redirect::route('people.create')->withErrors([
                    'error' => 'No se ha podido añadir la persona. El negocio escogido no existe.'
                ]);
            }

            // Check if the business already has an owner
            if ($business->owner) {
                return Redirect::route('people.create')->withErrors([
                    'error' => 'No se ha podido añadir la persona. El negocio escogido tiene dueño.'
                ]);
            }
        }

        // Prepare the details for the owner
        $detailsCEO['is_activated'] = true;
        if ($request->has('person_statuses_message')) {
            $detailsCEO['person_statuses_message'] = $request->person_statuses_message;
        }

        // Create the owner linking it to the person
        $owner = $person->owner()->create($detailsCEO);

        // If a business was found, link the newly created owner to the business
        if (isset($business)) {
            $business->owner_id = $owner->id; // Set the owner_id field of the business
            $business->save(); // Save the changes to the business
        }

        // Optionally, you might want to redirect or return a success message here
        return Redirect::route('people.index')->with('message', 'El dueño ha sido creado y vinculado al negocio exitosamente.');
    }
    private function handleEmployee($detailsEmployee, $person)
    {
        $employee = Employee::create(
            [
                'person_id' => $person->id,
                'is_activated' => true,
                'path_image' => $detailsEmployee['path_image']
            ]
        );
        $business = Business::findOrFail($detailsEmployee['business_employee_id']);

        if ($detailsEmployee['salary'] == "" || $detailsEmployee['salary'] == null)
            $detailsEmployee['salary'] = 0;
        $business->employees()->attach(

            $employee->id,
            [

                'is_activated' => true,
                'hireDate' => now(),
                'email_business' => $detailsEmployee['email_business'],
                'jobTitle' => $detailsEmployee['jobTitle'],
                'department' => $detailsEmployee['department'],
                'role' => $detailsEmployee['role'],
                'salary' => $detailsEmployee['salary']
            ]
        );
    }

    private function processAddress($addressData, $contact)
    {
        // Lógica para procesar direcciones y crear ubicaciones.
        if ($addressData['name'] && $addressData['zip_code']) {
            // Busca o crea la dirección.
            $location = Location::firstOrCreate([
                'name' => $addressData['name'],
                'zip_code' => $addressData['zip_code'],
            ], $addressData);

            return $location->id;
        }
        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $person = Person::find($id);

        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $person = Person::find($id);

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person): RedirectResponse
    {
        $data = $request->all();
        $data["is_activated"] =  $request->input('is_activated') === 'on' ? 1 : 0;
        $person->update($data);

        return Redirect::route('people.index')
            ->with('success', 'Person ' . __('validation.attributes.successfully_updated'));
    }

    public function destroy($id): RedirectResponse
    {
        Person::find($id)->delete();

        return Redirect::route('people.index')
            ->with('success', 'Person ' .  __('validation.attributes.successfully_removed'));
    }
}
