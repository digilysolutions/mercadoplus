<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Certification
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property BusinessCertification[] $businessCertifications
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Certification extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businessCertifications()
    {
        return $this->hasMany(\App\Models\BusinessCertification::class, 'id', 'certification_id');
    }
    
}
