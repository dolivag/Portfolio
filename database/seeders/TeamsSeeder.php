<?php

namespace Database\Seeders;

use App\Models\Team;

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team1 = new Team();
        $team1->name = "Barcelona Coders";
        $team1->city = "Barcelona";
        $team1->stadium = "Controller Stadium";
        $team1->year = 2016;
        $team1->shield = "images/barcelona-coders.jpg";

        $team1->save();

        $team2 = new Team();
        $team2->name = "Madrilenion Frontenders";
        $team2->city = "Madrid";
        $team2->stadium = "DeleteFrom Stadium";
        $team2->year = 2015;
        $team2->shield = "images/madrilenion-frontenders.jpg";

        $team2->save();

        $team3 = new Team();
        $team3->name = "Málaga Hackers";
        $team3->city = "Málaga";
        $team3->stadium = "GitIgnore Arena";
        $team3->year = 2020;
        $team3->shield = "images/malaga-hackers.jpg";

        $team3->save();

        $team4 = new Team();
        $team4->name = "Maño Galaxies";
        $team4->city = "Teruel";
        $team4->stadium = "Estadio Error 404";
        $team4->year = 2019;
        $team4->shield = "images/manio-galaxies.jpg";

        $team4->save();

        $team5 = new Team();
        $team5->name = "SantaKo Pigeons";
        $team5->city = "Santa Coloma de Gramanet";
        $team5->stadium = "SNTK Stadium";
        $team5->year = 2021;
        $team5->shield = "images/santako-pigeons.jpg";

        $team5->save();
    }
}
