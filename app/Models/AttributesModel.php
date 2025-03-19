<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AttributesModel
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property AttributeProduct[] $attributeProducts
 * @property Term[] $terms
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AttributesModel extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terms()
    {
        return $this->hasMany(\App\Models\Term::class, 'id', 'attribute_id');
    }

}
