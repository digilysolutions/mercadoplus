<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTag
 *
 * @property $id
 * @property $product_id
 * @property $tag_id
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Tag $tag
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductTag extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product_id', 'tag_id', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(\App\Models\Tag::class, 'tag_id', 'id');
    }
    
}
