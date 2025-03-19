<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property $id
 * @property $name
 * @property $is_activated
 * @property $created_at
 * @property $updated_at
 *
 * @property CountryCurrency[] $countryCurrencies
 * @property Province[] $provinces
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Country extends Model
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
    public function countryCurrencies()
    {
        return $this->hasMany(\App\Models\CountryCurrency::class, 'id', 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces()
    {
        return $this->hasMany(\App\Models\Province::class, 'id', 'country_id');
    }
    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'country_currencies')
                    ->withPivot('exchange_rate', 'code_currency_default');
    }

}
