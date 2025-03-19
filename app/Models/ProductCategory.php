<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 *
 * @property $id
 * @property $name
 * @property $short_code
 * @property $description
 * @property $category_parent
 * @property $path_image
 * @property $is_activated
 * @property $exchange_rates
 * @property $code_currency_default
 * @property $created_at
 * @property $updated_at
 *
 * @property ProductProductCategory[] $productProductCategories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductCategory extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'short_code', 'description', 'category_parent', 'path_image', 'is_activated', 'exchange_rates', 'code_currency_default'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productProductCategories()
    {
        return $this->hasMany(\App\Models\ProductProductCategory::class, 'id', 'product_category_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_category'); // Nombre de la tabla pivot aquí
    }
    
}
