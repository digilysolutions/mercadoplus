<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiscountsByQuantity
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $discount_type
 * @property $quantity
 * @property $discount_amount
 * @property $start_date
 * @property $end_date
 * @property $created_at
 * @property $updated_at
 *
 * @property Stock[] $stocks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiscountsByQuantity extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'is_activated', 'discount_type', 'quantity', 'discount_amount', 'start_date', 'end_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class, 'id', 'discounts_by_quantities_id');
    }
    
}
