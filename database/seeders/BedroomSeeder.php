<?php

namespace Database\Seeders;

use App\Models\Bedroom;

use Illuminate\Database\Seeder;

class BedroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room1 = new Bedroom();

        $room1->roomNumber = 101;
        $room1->capacity = 2;
        $room1->price = 37.50;

        $room1->save();

        $room2 = new Bedroom();

        $room2->roomNumber = 102;
        $room2->capacity = 4;
        $room2->price = 65.00;

        $room2->save();

        $room3 = new Bedroom();

        $room3->roomNumber = 103;
        $room3->capacity = 2;
        $room3->price = 42.20;

        $room3->save();

        $room4 = new Bedroom();

        $room4->roomNumber = 104;
        $room4->capacity = 2;
        $room4->price = 69.00;

        $room4->save();

        $room5 = new Bedroom();

        $room5->roomNumber = 105;
        $room5->capacity = 1;
        $room5->price = 23.00;

        $room5->save();

        $room6 = new Bedroom();

        $room6->roomNumber = 201;
        $room6->capacity = 4;
        $room6->price = 53.25;

        $room6->save();

        $room7 = new Bedroom();

        $room7->roomNumber = 202;
        $room7->capacity = 3;
        $room7->price = 46.80;

        $room7->save();

        $room8 = new Bedroom();

        $room8->roomNumber = 203;
        $room8->capacity = 5;
        $room8->price = 83.40;

        $room8->save();

        $room9 = new Bedroom();

        $room9->roomNumber = 204;
        $room9->capacity = 2;
        $room9->price = 36.90;

        $room9->save();

        $room10 = new Bedroom();

        $room10->roomNumber = 205;
        $room10->capacity = 6;
        $room10->price = 100.00;

        $room10->save();

        $room11 = new Bedroom();

        $room11->roomNumber = 301;
        $room11->capacity = 2;
        $room11->price = 41.70;

        $room11->save();

        $room12 = new Bedroom();

        $room12->roomNumber = 302;
        $room12->capacity = 4;
        $room12->price = 66.60;

        $room12->save();

        $room13 = new Bedroom();

        $room13->roomNumber = 303;
        $room13->capacity = 7;
        $room13->price = 120.00;

        $room13->save();

        $room14 = new Bedroom();

        $room14->roomNumber = 304;
        $room14->capacity = 1;
        $room14->price = 21.50;

        $room14->save();

        $room15 = new Bedroom();

        $room15->roomNumber = 305;
        $room15->capacity = 2;
        $room15->price = 41.60;

        $room15->save();
    }
}
