<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Good extends Model
{
    protected $fillable = [
        'description',
        'will_trade',
        'price',
        'free'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class);
    }
}
