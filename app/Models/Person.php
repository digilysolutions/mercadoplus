<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * @property $id
 * @property $first_name
 * @property $middle_name
 * @property $last_name
 * @property $gender
 * @property $marital_status
 * @property $blood_group
 * @property $language
 * @property $contact_id
 * @property $person_statuses_id
 * @property $is_activated
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contact $contact
 * @property PersonStatus $personStatus
 * @property User $user
 * @property Customer[] $customers
 * @property Employee[] $employees
 * @property OrderProduct[] $orderProducts
 * @property Order[] $orders
 * @property Order[] $orders
 * @property Order[] $orders
 * @property Owner[] $owners
 * @property Rating[] $ratings
 * @property Review[] $reviews
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'gender', 'marital_status', 'blood_group', 'language', 'contact_id', 'person_statuses_id', 'is_activated', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(\App\Models\Contact::class, 'contact_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personStatus()
    {
        return $this->belongsTo(\App\Models\PersonStatus::class, 'person_statuses_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany(\App\Models\Customer::class, 'id', 'person_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
    public function owner()
    {
        return $this->hasOne(Owner::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'id', 'person_id');
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'id', 'person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveriesPerson()
    {
        return $this->hasMany(\App\Models\Order::class, 'id', 'delivery_person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'id', 'person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasePerson()
    {
        return $this->hasMany(\App\Models\Order::class, 'id', 'purchase_person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owners()
    {
        return $this->hasMany(\App\Models\Owner::class, 'id', 'person_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class, 'id', 'writer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'id', 'writer_id');
    }

    public function getPersonType()
    {
        if ($this->owner()->exists()) {
            return 'CEO';
        } elseif ($this->employee()->exists()) {
            return 'Empleado';
        } elseif ($this->customer()->exists()) {
            return 'Cliente    ';
        }
        return null; // Si no es ninguno de los tipos
    }

}
