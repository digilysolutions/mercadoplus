<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserRequest;
use App\Mail\StudentConfirmationMail;
use App\Models\Membership;
use App\Models\Person;
use App\Models\StudyCenter;
use App\Models\User;
use App\Validators\PasswordValidator;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();
        $memberships = Membership::allActivated();
        return view('user.create', compact('user','memberships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['username'] = (isset($request->username) && !empty($request->username)) ? $request->username : $request->name;
        $data['activated'] = true;
        $data['password'] = $request->password;
        $data['name'] = $request->name;
        $data['lastname'] = $request->lastname;
        $data['studycenters_id'] = $request->studycenters_id;
        $data['membership_id'] = $request->membership_id;
        // Iniciar una transacción para asegurar la consistencia
        $validator = PasswordValidator::validate($data);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //Obtener la membresía del centro de estudio


            DB::transaction(function () use ($data) {


                // Crear el usuario
                $user = User::create([
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']), // Contraseña inicial
                    'activated' => true,
                    'role' => 'Estudiante',
                    'roleid' => 2
                ]);

                $data['user_id'] = $user->id;
                $person = Person::create($data);

                $data['people_id'] = $person->id;
                // Crear el estudiante


                $student = Student::create($data);

                // Enviar correo de confirmación
                //  Mail::to($person->email)->send(new StudentConfirmationMail($student->id));
                return Redirect::route('users.index')
                ->with('success', 'Usuario  creado satisfactoriamente.');
            });

        return Redirect::route('users.index');
    }
    public function updatePassword(Request $request, $userId)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $student = Student::findOrFail($userId);
        $user = User::findOrFail($student->user_id);
        $user->password = bcrypt($request->password);
        $user->activated = true; // Activar el usuario
        $user->save();
        return redirect()->route('home')->with('message', 'Contraseña actualizada con éxito. Ahora puedes iniciar sesión.');
    }
    public function activate($tracking_code)
    {
        $person = Person::where('tracking_code', $tracking_code)->firstOrFail();

        // Activar el estudiante aquí
        $student = $person->student;
        if ($student) {
            $student->activated = true;
            $student->save();

            // Redirigir a la pantalla de cambio de contraseña
            return view('students.set_password', ['student' => $student]);
        }

        return response()->json(['message' => 'Estudiante no encontrado.'], 404);
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $memberships = Membership::allActivated();

        return view('user.edit', compact('user', 'memberships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $data['username'] = (isset($request->username) && !empty($request->username)) ? $request->username : $request->name;
        $data['name'] = $request->name;
        $data['lastname'] = $request->lastname;
        $data['activated'] = true;
        $data['password'] = $request->password;
        $data['studycenters_id'] = $request->studycenters_id;
        $data['membership_id'] =  $request->membership_id;

        // Iniciar una transacción para asegurar la consistencia
        $validator = PasswordValidator::validate($data);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($data, $user) {
            // Actualizar el usuario

            if ($user) {
                $user->update([
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']), // Contraseña inicial
                    'activated' => true,
                    'role' => 'Estudiante',
                    'roleid' => 2
                ]);
            }

            // Actualizar el estudiante y la persona

                $user->person->update($data);
                $user->person->student->update($data);

            // Enviar correo de confirmación
            // Mail::to($person->email)->send(new StudentConfirmationMail($student->id));

            return Redirect::route('users.index')
                ->with('success', 'El usuario actualizado satisfactoriamente');
        });

        return Redirect::route('users.index')
            ->with('error', 'No se puede actualizar el estudiante.');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'Usuario General eliminado satisfactoriamente');
    }
}
