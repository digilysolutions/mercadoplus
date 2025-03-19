<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $temporary_id
 * @property $person_id
 * @property $purchase_person_id
 * @property $delivery_person_id
 * @property $status_id
 * @property $subtotal_amount
 * @property $total_amount
 * @property $currency
 * @property $exchange_rate
 * @property $address
 * @property $home_delivery
 * @property $delivery_fee
 * @property $purchase_date
 * @property $delivery_date
 * @property $delivery_time
 * @property $time_unit
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Person $person
 * @property Person $person
 * @property StatusOrder $statusOrder
 * @property OrderProduct[] $orderProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['temporary_id', 'person_id', 'purchase_person_id', 'delivery_person_id', 'status_id', 'subtotal_amount', 'total_amount', 'currency', 'exchange_rate', 'address', 'home_delivery', 'delivery_fee', 'purchase_date', 'delivery_date', 'delivery_time', 'time_unit'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'delivery_person_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'purchase_person_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusOrder()
    {
        return $this->belongsTo(\App\Models\StatusOrder::class, 'status_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'id', 'order_id');
    }
    
}
