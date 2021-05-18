<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Painting;


class PaintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Painting::factory(25)->create();
    }
}
