<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
<<<<<<< HEAD
    public $timestamps = false;
    
=======

    public $timestamps = false;
    protected $fillable = ["genre"];

>>>>>>> 7ad3d7ca20ff35d57638d0150d7c1dde2ec53f8e
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public static function fromStrings(array $strings) 
    {
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
<<<<<<< HEAD
                                ->map(fn($str) => Game::firstOrCreate(["name" => $str]));
=======
                                ->map(fn($str) => Genre::firstOrCreate(["genre" => $str]));
>>>>>>> 7ad3d7ca20ff35d57638d0150d7c1dde2ec53f8e
    }
}
