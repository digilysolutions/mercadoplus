<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 *
 * @property $id
 * @property $order_id
 * @property $person_id
 * @property $price
 * @property $quantity
 * @property $total_price
 * @property $subtotal_price
 * @property $price_discount
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderProduct extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['order_id', 'person_id', 'price', 'quantity', 'total_price', 'subtotal_price', 'price_discount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id', 'id');
    }
    
}
