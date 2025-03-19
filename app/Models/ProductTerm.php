<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTerm
 *
 * @property $id
 * @property $product_id
 * @property $term_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Term $term
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductTerm extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product_id', 'term_id'];


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
    public function term()
    {
        return $this->belongsTo(\App\Models\Term::class, 'term_id', 'id');
    }
    
}
