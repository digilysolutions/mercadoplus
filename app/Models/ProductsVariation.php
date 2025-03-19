<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsVariation
 *
 * @property $id
 * @property $is_activated
 * @property $variation_id
 * @property $variations_term_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Variation $variation
 * @property Term $term
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductsVariation extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['is_activated', 'variation_id', 'variations_term_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variation()
    {
        return $this->belongsTo(\App\Models\Variation::class, 'variation_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function term()
    {
        return $this->belongsTo(\App\Models\Term::class, 'variations_term_id', 'id');
    }
    
}
