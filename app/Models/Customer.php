<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property $id
 * @property $person_id
 * @property $person_statuses_message
 * @property $billingAddress_id
 * @property $shippingAddress_id
 * @property $creditCardNumber
 * @property $creditCardExpirationDate
 * @property $creditLimit
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Location $location
 * @property Person $person
 * @property Location $location
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['person_id', 'person_statuses_message', 'billingAddress_id', 'shippingAddress_id', 'creditCardNumber', 'creditCardExpirationDate', 'creditLimit', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAddress()
    {
        return $this->belongsTo(\App\Models\Location::class, 'billingAddress_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingAddress()
    {
        return $this->belongsTo(\App\Models\Location::class, 'shippingAddress_id', 'id');
    }

}
