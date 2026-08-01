<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'author',
        'category_id',
        'age_range_min',
        'age_range_max',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'age_range_min' => 'integer',
        'age_range_max' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the category that owns the book.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the chapters for the book.
     */
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    /**
     * Get the age range as a formatted string.
     */
    public function getAgeRangeAttribute(): string
    {
        return "{$this->age_range_min}-{$this->age_range_max} tahun";
    }

    /**
     * Get the cover image URL.
     */
    public function getCoverUrlAttribute(): ?string
    {
        if ($this->cover_image) {
            return asset("storage/covers/{$this->cover_image}");
        }

        return null;
    }

    /**
     * Get the thumbnail URL.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->cover_image) {
            return asset("storage/covers/thumbnails/{$this->cover_image}");
        }

        return null;
    }

    /**
     * Scope a query to only include active books.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by age range.
     */
    public function scopeForAge($query, int $age)
    {
        return $query->where('age_range_min', '<=', $age)
            ->where('age_range_max', '>=', $age);
    }

    /**
     * Get the gradient color for placeholder cover.
     */
    public function getGradientColorAttribute(): string
    {
        return $this->category?->gradient_color ?? 'from-purple-400 to-pink-500';
    }
}
