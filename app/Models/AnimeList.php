<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimeList extends Model
{
    protected $fillable = [
        'user_id', 'anime_id', 'translations', 'title', 'image_url', 'status', 'progress_episode', 'score'
    ];

    protected $casts = [
        'translations' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
