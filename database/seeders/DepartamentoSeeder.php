<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = new Departamento();

        $departamento->nombre = "Software";

        $departamento->save();

        $departamento2 = new Departamento();

        $departamento2->nombre = "Finanzas";

        $departamento2->save();

        $departamento3 = new Departamento();

        $departamento3->nombre = "Recursos humanos";

        $departamento3->save();
    }
}
