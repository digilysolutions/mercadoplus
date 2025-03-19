<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnitBase
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Unit[] $units
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UnitBase extends Model
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
    public function units()
    {
        return $this->hasMany(\App\Models\Unit::class, 'id', 'unitbase_id');
    }
    
}
