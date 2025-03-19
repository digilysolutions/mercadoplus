<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $sku
 * @property $description
 * @property $description_small
 * @property $outstanding_image
 * @property $code_currency_default
 * @property $expiration_date
 * @property $expiry_period_type
 * @property $expiry_period
 * @property $purchase_price
 * @property $sale_price
 * @property $discounted_price
 * @property $start_date_discounted_price
 * @property $end_date_discounted_price
 * @property $enable_delivery
 * @property $enable_reservation
 * @property $views
 * @property $sales
 * @property $weight
 * @property $height
 * @property $width
 * @property $length
 * @property $enable_stock
 * @property $enable_variations
 * @property $brand_id
 * @property $model_id
 * @property $unit_id
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property ModelProduct $modelProduct
 * @property Unit $unit
 * @property AttributeProduct[] $attributeProducts
 * @property BusinessProduct[] $businessProducts
 * @property ProductDeliveryZone[] $productDeliveryZones
 * @property ProductImage[] $productImages
 * @property ProductProductCategory[] $productProductCategories
 * @property ProductTag[] $productTags
 * @property ProductTerm[] $productTerms
 * @property ProductsCurrency[] $productsCurrencies
 * @property Rating[] $ratings
 * @property Review[] $reviews
 * @property Stock[] $stocks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'sku', 'description', 'description_small', 'outstanding_image', 'code_currency_default', 'expiration_date', 'expiry_period_type', 'expiry_period', 'purchase_price', 'sale_price', 'discounted_price', 'start_date_discounted_price', 'end_date_discounted_price', 'enable_delivery', 'enable_reservation', 'views', 'sales', 'weight', 'height', 'width', 'length', 'enable_stock', 'enable_variations', 'brand_id', 'model_id', 'unit_id', 'is_activated'];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
    public function terms()
    {
        return $this->belongsToMany(Term::class);
    }
    public function currencies()
    {
        return $this->belongsToMany(Currency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'brand_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modelProduct()
    {
        return $this->belongsTo(\App\Models\ModelProduct::class, 'model_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeProducts()
    {
        return $this->hasMany(AttributesModel::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessProducts()
    {
        return $this->hasMany(\App\Models\BusinessProduct::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productDeliveryZones()
    {
        return $this->hasMany(\App\Models\ProductDeliveryZone::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages()
    {
        return $this->hasMany(\App\Models\ProductImage::class, 'id', 'product_id');
    }
    public function deliveryZones()
    {
        return $this->belongsToMany(DeliveryZone::class, 'delivery_zone_product', 'product_id', 'delivery_zone_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productProductCategories()
    {
        return $this->hasMany(\App\Models\ProductProductCategory::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTags()
    {
        return $this->hasMany(\App\Models\ProductTag::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTerms()
    {
        return $this->hasMany(\App\Models\ProductTerm::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsCurrencies()
    {
        return $this->hasMany(\App\Models\ProductsCurrency::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(\App\Models\Rating::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class, 'product_id');
    }

}
