<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ["title", "min_players", "max_players", "difficulty", "time"];
    public $timestamps = false;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
