<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CountryCurrency
 *
 * @property $id
 * @property $currency_id
 * @property $country_id
 * @property $exchange_rate
 * @property $code_currency_default
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property Country $country
 * @property Currency $currency
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CountryCurrency extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['currency_id', 'country_id', 'exchange_rate', 'code_currency_default', 'is_activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_id', 'id');
    }
    
}
