<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Departamento extends Model
{
    use HasFactory;

    public function employees()
    {
        //$employees = Empleado::where('departamento_id', $this->id)->get();
        //return $employees;
        return $this->hasMany(Empleado::class);
    }

    public function count_employees()
    {
        //$employees = Empleado::where('departamento_id', $this->id)->get();
        //return $employees;
        $empleados = $this->employees();
        return $empleados->count();
    }
}
