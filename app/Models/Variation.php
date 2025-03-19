<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Variation
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $stock_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Stock $stock
 * @property ProductsVariation[] $productsVariations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Variation extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'is_activated', 'stock_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(\App\Models\Stock::class, 'stock_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsVariations()
    {
        return $this->hasMany(\App\Models\ProductsVariation::class, 'id', 'variation_id');
    }
    
}
