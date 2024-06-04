<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Letter extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $with = ['unit', 'letterType'];

    /*
    |--------------------------------------------------------------------------
    | Relation
    |--------------------------------------------------------------------------
    */

    /**
     * Get the unit that owns the Letter
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get the letterType that owns the Letter
     */
    public function letterType(): BelongsTo
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | Scope
    |--------------------------------------------------------------------------
    */

    /**
     * Scope Filter.
     *
     * @return scope
     */
    public function scopeFilter($query, object $filter)
    {
        // If filter by status exists
        $query->when($filter->status ?? false, fn ($query, $status) => $query->where('status', $status));

        // If Filter By unit exits
        $query->when($filter->unit ?? false, fn ($query, $unit) => $query->where('unit_id', $unit));

        // If filter by letter type exists
        $query->when($filter->letterType ?? false, fn ($query, $letterType) => $query->where('letter_type_id', $letterType));

        // If filter by start date exists
        $query->when($filter->startDate ?? false, fn ($query, $startDate) => $query->where('date', '>=', $startDate));

        // If filter by end date exists
        $query->when($filter->endDate ?? false, fn ($query, $endDate) => $query->where('date', '<=', $endDate));
    }
}
