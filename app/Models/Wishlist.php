<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'rawg_game_id',
        'game_name',
        'game_slug',
        'game_image',
        'game_rating',
        'game_released',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}