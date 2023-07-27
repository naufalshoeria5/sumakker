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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get the letterType that owns the Letter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function letterType(): BelongsTo
    {
        return $this->belongsTo(letterType::class, 'letter_type_id', 'id');
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
    function scopeFilter($query, object $filter)
    {
        // If filter by status exists
        $query->when($filter->status ?? false, fn ($query, $status) => $query->where('status', $status));
    }
}
