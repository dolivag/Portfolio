<?php

namespace Database\Seeders;

use App\Models\Reservation;

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res1 = new Reservation();
        $res1->name = "Daniel Oliva";
        $res1->checkin = "20210510";
        $res1->checkout = "20210512";
        $res1->days = 2;
        $res1->people = 2;
        $res1->room = 1;
        $res1->save();

        $re2 = new Reservation();
        $re2->name = "Jordi Gómez";
        $re2->checkin = "20210514";
        $re2->checkout = "20210517";
        $re2->days = 3;
        $re2->people = 2;
        $re2->room = 1;
        $re2->save();

        $re3 = new Reservation();
        $re3->name = "Marta Alicante";
        $re3->checkin = "20210509";
        $re3->checkout = "20210511";
        $re3->days = 2;
        $re3->people = 3;
        $re3->room = 7;
        $re3->save();
    }
}
