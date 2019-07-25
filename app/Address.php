<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 *
 * @method primary()
 */
class Address extends Model
{
    use SoftDeletes;

    // TODO Obserserver for changing primary, resetting all others.
    public function scopePrimary(Builder $query): Builder
    {
        return $query->where('primary', true);
    }
}
