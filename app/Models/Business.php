<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $industry
 * @property $website
 * @property $is_activated
 * @property $logo
 * @property $currency_id
 * @property $contact_id
 * @property $owner_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contact $contact
 * @property Currency $currency
 * @property Owner $owner
 * @property BusinessCertification[] $businessCertifications
 * @property BusinessEmployee[] $businessEmployees
 * @property BusinessProduct[] $businessProducts
 * @property Review[] $reviews
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Business extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'industry', 'website', 'is_activated', 'logo', 'currency_id', 'contact_id', 'owner_id'];


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
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(\App\Models\Owner::class, 'owner_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessCertifications()
    {
        return $this->hasMany(\App\Models\BusinessCertification::class, 'id', 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessEmployees()
    {
        return $this->hasMany(\App\Models\BusinessEmployee::class, 'id', 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessProducts()
    {
        return $this->hasMany(\App\Models\BusinessProduct::class, 'id', 'business_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'id', 'business_id');
    }
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'business_employee') // Asegúrate de que la tabla intermedia exista
                ->withPivot('is_activated', 'hireDate', 'email_business', 'person_statuses_message', 'jobTitle', 'department', 'role', 'salary');
    }

}
