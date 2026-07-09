<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'chapters';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'book_id',
        'title',
        'page_number',
        'content',
        'image',
        'audio_url',
        'order',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'page_number' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Get the book that owns the chapter.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
