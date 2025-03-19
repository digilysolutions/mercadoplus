<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryZone
 *
 * @property $id
 * @property $location_id
 * @property $price
 * @property $delivery_time
 * @property $time_unit
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Location $location
 * @property ProductDeliveryZone[] $productDeliveryZones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DeliveryZone extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['location_id', 'price', 'delivery_time', 'time_unit', 'is_activated'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'delivery_zone_product', 'delivery_zone_id', 'product_id');
    }

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


}
