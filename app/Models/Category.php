<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    /**
     * Get the book count.
     */
    public function getBookCountAttribute(): int
    {
        return $this->books()->count();
    }

    /**
     * Get the books for the category.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Get the gradient color for placeholder covers.
     */
    public function getGradientColorAttribute(): string
    {
        return match ($this->slug) {
            'hewan' => 'from-pink-400 to-rose-500',
            'petualangan' => 'from-green-400 to-emerald-500',
            'pengalaman' => 'from-blue-400 to-indigo-500',
            'keluarga' => 'from-purple-400 to-violet-500',
            'lagu' => 'from-yellow-400 to-orange-500',
            'dongeng' => 'from-rose-400 to-pink-500',
            default => 'from-purple-400 to-pink-500',
        };
    }

    /**
     * Get the gradient start color (Tailwind class).
     */
    public function getGradientStartAttribute(): string
    {
        return match ($this->slug) {
            'hewan' => '#f472b6',
            'petualangan' => '#4ade80',
            'pengalaman' => '#60a5fa',
            'keluarga' => '#a78bfa',
            'lagu' => '#fbbf24',
            'dongeng' => '#fb7185',
            default => '#a78bfa',
        };
    }

    /**
     * Get the gradient end color (Tailwind class).
     */
    public function getGradientEndAttribute(): string
    {
        return match ($this->slug) {
            'hewan' => '#f43f5e',
            'petualangan' => '#10b981',
            'pengalaman' => '#6366f1',
            'keluarga' => '#8b5cf6',
            'lagu' => '#f97316',
            'dongeng' => '#ec4899',
            default => '#6c5ce7',
        };
    }
}
