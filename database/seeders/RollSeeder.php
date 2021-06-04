<?php

namespace Database\Seeders;

use App\Models\Roll;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roll1 = new Roll();
        $roll1->dice1 = 3;
        $roll1->dice2 = 5;
        if ($roll1->dice1 + $roll1->dice2 == 7) {
            $roll1->victory = true;
        } else {
            $roll1->victory = false;
        };
        $roll1->userId = 1;
        $roll1->save();

        $roll2 = new Roll();
        $roll2->dice1 = 3;
        $roll2->dice2 = 4;
        if ($roll2->dice1 + $roll2->dice2 == 7) {
            $roll2->victory = true;
        } else {
            $roll2->victory = false;
        };
        $roll2->userId = 1;
        $roll2->save();

        Roll::factory(20)->create();
    }
}
