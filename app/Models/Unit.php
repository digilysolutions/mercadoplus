<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $shortname
 * @property $unitbase_id
 * @property $created_at
 * @property $updated_at
 *
 * @property UnitBase $unitBase
 * @property DiscountsByWeight[] $discountsByWeights
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unit extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'is_activated', 'shortname', 'unitbase_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitBase()
    {
        return $this->belongsTo(\App\Models\UnitBase::class, 'unitbase_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discountsByWeights()
    {
        return $this->hasMany(\App\Models\DiscountsByWeight::class, 'id', 'unit_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'id', 'unit_id');
    }
    
}
