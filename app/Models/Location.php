<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $zip_code
 * @property $city
 * @property $address
 * @property $municipality_id
 * @property $landmark
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipality $municipality
 * @property Contact[] $contacts
 * @property Customer[] $customers
 * @property Customer[] $customers
 * @property DeliveryZone[] $deliveryZones
 * @property Warehouse[] $warehouses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Location extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'zip_code', 'city', 'address', 'municipality_id', 'landmark', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipality()
    {
        return $this->belongsTo(\App\Models\Municipality::class, 'municipality_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Contact::class, 'id', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAddress()
    {
        return $this->hasMany(\App\Models\Customer::class, 'id', 'billingAddress_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingAddress()
    {
        return $this->hasMany(\App\Models\Customer::class, 'id', 'shippingAddress_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryZones()
    {
        return $this->hasMany(\App\Models\DeliveryZone::class, 'id', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warehouses()
    {
        return $this->hasMany(\App\Models\Warehouse::class, 'id', 'location_id');
    }

}
