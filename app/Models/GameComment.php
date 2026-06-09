<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameComment extends Model
{
    protected $fillable = [
        'user_id',
        'rawg_game_id',
        'game_name',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}