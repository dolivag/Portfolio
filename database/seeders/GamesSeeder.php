<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game1 = new Game();

        $game1->date = "20210427";
        $game1->stadium = "Controller Stadium";
        $game1->team1 = 1;
        $game1->team2 = 2;
        $game1->result1 = 3;
        $game1->result2 = 1;

        $game1->save();

        $game2 = new Game();

        $game2->date = "20210430";
        $game2->stadium = "Gitignore Arena";
        $game2->team1 = 3;
        $game2->team2 = 2;
        $game2->result1 = 2;
        $game2->result2 = 0;

        $game2->save();

        $game3 = new Game();

        $game3->date = "20210503";
        $game3->stadium = "Gitignore Arena";
        $game3->team1 = 3;
        $game3->team2 = 1;
        $game3->result1 = 1;
        $game3->result2 = 3;

        $game3->save();

        $game4 = new Game();

        $game4->date = "20210504";
        $game4->team1 = 2;
        $team1 = Team::find($game4->team1);
        $game4->team2 = 4;
        $game4->result1 = 2;
        $game4->result2 = 1;
        $game4->stadium = $team1->stadium;

        $game4->save();

        $game5 = new Game();

        $game5->date = "20210507";
        $game5->team1 = 4;
        $team1 = Team::find($game5->team1);
        $game5->team2 = 5;
        $game5->result1 = 1;
        $game5->result2 = 3;
        $game5->stadium = $team1->stadium;

        $game5->save();

        $game6 = new Game();

        $game6->date = "20210508";
        $game6->team1 = 5;
        $team1 = Team::find($game6->team1);
        $game6->team2 = 1;
        $game6->result1 = 0;
        $game6->result2 = 4;
        $game6->stadium = $team1->stadium;

        $game6->save();

        $game7 = new Game();

        $game7->date = "20210510";
        $game7->team1 = 2;
        $team1 = Team::find($game7->team1);
        $game7->team2 = 4;
        $game7->result1 = 1;
        $game7->result2 = 2;
        $game7->stadium = $team1->stadium;

        $game7->save();
    }
}
