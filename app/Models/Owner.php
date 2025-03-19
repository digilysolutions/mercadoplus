<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Owner
 *
 * @property $id
 * @property $is_activated
 * @property $person_id
 * @property $person_statuses_message
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Business[] $businesses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Owner extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['is_activated', 'person_id', 'person_statuses_message'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
        public function businesses()
        {
            return $this->hasMany(\App\Models\Business::class,'owner_id' );
        }

}
