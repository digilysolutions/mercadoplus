<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $path_image
 * @property $person_id
 * @property $person_statuses_message
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property BusinessEmployee[] $businessEmployees
 * @property Warehouse[] $warehouses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['path_image', 'person_id', 'person_statuses_message', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessEmployees()
    {
        return $this->hasMany(\App\Models\BusinessEmployee::class, 'id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warehouses()
    {
        return $this->hasMany(\App\Models\Warehouse::class, 'id', 'inventory_manager');
    }
    public function businesses()
    {
        return $this->belongsToMany(Business::class, 'business_employee')
                    ->withPivot('is_activated', 'hireDate', 'email_business', 'person_statuses_message', 'jobTitle', 'department', 'role', 'salary');
    }
}
