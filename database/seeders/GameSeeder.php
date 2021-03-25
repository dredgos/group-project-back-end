<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file(__DIR__ . '/boardgames.csv'));

        foreach($csv as $game)
        {
            $gameInDB = Game::create([
                "title" => $game[0],
                "min_players" => $game[1],
                "max_players" => $game[2],
                "difficulty" => $game[3],
                "time" => $game[6],
                "img_url" => $game[7],
                "description" => $game[9]
            ]); 
            
            if($game[4] !== "")
            {
                $gameInDB->setGenres([$game[4]]);
            }

            if($game[5] !== "")
            {
                $gameInDB->setGenres([$game[5]]);
            }

            if($game[5] !== "" && $game[4] !== "")
            {
                $gameInDB->setGenres([$game[4], $game[5]]);
            }

        }
        
    }
}
