<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public $timestamps = false;
    protected $fillable = ["genre"];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public static function fromStrings(array $strings) 
    {
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
                                ->map(fn($str) => Genre::firstOrCreate(["genre" => $str]));
    }
}
