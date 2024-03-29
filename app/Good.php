<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function claim(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnclaimed(Builder $query): Builder
    {
        return $query->whereNull('claimed_by');
    }

    public function scopeCategory(Builder $query, string $categoryId): Builder
    {
        return $query->whereHas('category', static function (Builder $query) use ($categoryId) {
            $query->where('id', $categoryId);
        });
    }
}
