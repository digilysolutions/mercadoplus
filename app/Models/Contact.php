<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property $id
 * @property $email
 * @property $family_number
 * @property $alternate_number
 * @property $mobile
 * @property $phone
 * @property $location_id
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Location $location
 * @property Business[] $businesses
 * @property Person[] $people
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contact extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['email', 'family_number', 'alternate_number', 'mobile', 'phone', 'location_id', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(\App\Models\Business::class, 'id', 'contact_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany(\App\Models\Person::class, 'id', 'contact_id');
    }
    
}
