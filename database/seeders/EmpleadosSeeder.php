<?php

namespace Database\Seeders;

use App\Models\Empleado;

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado1 = new Empleado();

        $empleado1->nombre = "Daniel";
        $empleado1->apellidos = "Oliva Gómez";
        $empleado1->email = "danielolivagomez@gmail.com";

        $empleado1->telefono = "663316818";
        $empleado1->departamento_id = 1;

        $empleado1->save();



        $empleado2 = new Empleado();

        $empleado2->nombre = "Alba";
        $empleado2->apellidos = "Jiménez Cuesta";
        $empleado2->email = "albagmail.com";

        $empleado2->telefono = "645988523";
        $empleado2->departamento_id = 2;

        $empleado2->save();

        $empleado3 = new Empleado();

        $empleado3->nombre = "Javier";
        $empleado3->apellidos = "Almendralejo Álvarez";
        $empleado3->email = "javier@gmail.com";

        $empleado3->telefono = "645887799";
        $empleado3->departamento_id = 3;

        $empleado3->save();

        $empleado4 = new Empleado();

        $empleado4->nombre = "Marta";
        $empleado4->apellidos = "Valencia Peláez";
        $empleado4->email = "marta@gmail.com";

        $empleado4->telefono = "648120035";
        $empleado4->departamento_id = 1;

        $empleado4->save();
    }
}
