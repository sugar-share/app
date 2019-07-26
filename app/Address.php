<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 *
 * @method primary()
 *
 * @property-read User $user
 */
class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'postal_code',
        'city',
        'administrative_area_level_1',
        'administrative_area_level_2'
    ];

    // TODO Obserserver for changing primary, resetting all others.
    public function scopePrimary(Builder $query): Builder
    {
        return $query->where('primary', true);
    }

    public function save(array $options = [])
    {
        // TODO Sloppy, but it'll do pig.
        $this->user->addresses()->update(['primary' => false]);
        return parent::save($options);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
