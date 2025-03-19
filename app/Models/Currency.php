<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @property $id
 * @property $currency
 * @property $country
 * @property $is_activated
 * @property $path_flag
 * @property $code
 * @property $symbol
 * @property $thousand_separator
 * @property $decimal_separator
 * @property $created_at
 * @property $updated_at
 *
 * @property Business[] $businesses
 * @property CountryCurrency[] $countryCurrencies
 * @property ProductsCurrency[] $productsCurrencies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Currency extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['currency', 'country', 'is_activated', 'path_flag', 'code', 'symbol', 'thousand_separator', 'decimal_separator'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(\App\Models\Business::class, 'id', 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countryCurrencies()
    {
        return $this->hasMany(\App\Models\CountryCurrency::class, 'id', 'currency_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsCurrencies()
    {
        return $this->hasMany(\App\Models\ProductsCurrency::class, 'id', 'currency_id');
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'country_currencies');
    }
}
