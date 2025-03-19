<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BusinessCertification
 *
 * @property $id
 * @property $certification_id
 * @property $business_id
 * @property $delivery
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Business $business
 * @property Certification $certification
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BusinessCertification extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['certification_id', 'business_id', 'delivery', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo(\App\Models\Business::class, 'business_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certification()
    {
        return $this->belongsTo(\App\Models\Certification::class, 'certification_id', 'id');
    }
    
}
