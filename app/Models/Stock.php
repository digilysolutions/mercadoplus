<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 *
 * @property $id
 * @property $warehouse_id
 * @property $quantity_available
 * @property $minimum_quantity
 * @property $maximum_quantity
 * @property $product_id
 * @property $taxs_rates_id
 * @property $is_activated
 * @property $enable_discounts_by_quantities
 * @property $enable_discounts_by_weights
 * @property $enable_discounts_by_expiration_dates
 * @property $enable_discounts_by_discounts_by_important_dates
 * @property $discounts_by_quantities_id
 * @property $discounts_by_weights_id
 * @property $discounts_by_expiration_dates_id
 * @property $discounts_by_discounts_by_important_dates_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DiscountsByImportantDate $discountsByImportantDate
 * @property DiscountsByExpirationDate $discountsByExpirationDate
 * @property DiscountsByQuantity $discountsByQuantity
 * @property DiscountsByWeight $discountsByWeight
 * @property Product $product
 * @property TaxsRate $taxsRate
 * @property Warehouse $warehouse
 * @property Variation[] $variations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stock extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['warehouse_id', 'quantity_available', 'minimum_quantity', 'maximum_quantity', 'product_id', 'taxs_rates_id', 'is_activated', 'enable_discounts_by_quantities', 'enable_discounts_by_weights', 'enable_discounts_by_expiration_dates', 'enable_discounts_by_discounts_by_important_dates', 'discounts_by_quantities_id', 'discounts_by_weights_id', 'discounts_by_expiration_dates_id', 'discounts_by_discounts_by_important_dates_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discountsByImportantDate()
    {
        return $this->belongsTo(\App\Models\DiscountsByImportantDate::class, 'discounts_by_discounts_by_important_dates_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discountsByExpirationDate()
    {
        return $this->belongsTo(\App\Models\DiscountsByExpirationDate::class, 'discounts_by_expiration_dates_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discountsByQuantity()
    {
        return $this->belongsTo(\App\Models\DiscountsByQuantity::class, 'discounts_by_quantities_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discountsByWeight()
    {
        return $this->belongsTo(\App\Models\DiscountsByWeight::class, 'discounts_by_weights_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxsRate()
    {
        return $this->belongsTo(\App\Models\TaxsRate::class, 'taxs_rates_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Warehouse::class, 'warehouse_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variations()
    {
        return $this->hasMany(\App\Models\Variation::class, 'id', 'stock_id');
    }

}
