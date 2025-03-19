<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Term
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $attribute_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Attribute $attribute
 * @property ProductTerm[] $productTerms
 * @property ProductsVariation[] $productsVariations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Term extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'is_activated', 'attribute_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(\App\Models\AttributesModel::class, 'attribute_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTerms()
    {
        return $this->hasMany(\App\Models\ProductTerm::class, 'id', 'term_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsVariations()
    {
        return $this->hasMany(\App\Models\ProductsVariation::class, 'id', 'variations_term_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
}
