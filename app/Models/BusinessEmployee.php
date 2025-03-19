<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BusinessEmployee
 *
 * @property $id
 * @property $is_activated
 * @property $employee_id
 * @property $business_id
 * @property $hireDate
 * @property $email_business
 * @property $person_statuses_id
 * @property $person_statuses_message
 * @property $jobTitle
 * @property $department
 * @property $role
 * @property $salary
 * @property $created_at
 * @property $updated_at
 *
 * @property Business $business
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BusinessEmployee extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['is_activated', 'employee_id', 'business_id', 'hireDate', 'email_business', 'person_statuses_id', 'person_statuses_message', 'jobTitle', 'department', 'role', 'salary'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo(\App\Models\Business::class, 'business_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'id', 'employee_id');
    }

}
