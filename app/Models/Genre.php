<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public static function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
                                ->map(fn($str) => Tag::firstOrCreate(["name" => $str]));
    }
}
