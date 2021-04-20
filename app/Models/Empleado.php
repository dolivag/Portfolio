<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;


class Empleado extends Model
{
    protected $fillable = ["nombre", "apellidos", "email", "telefono", "departamento_id"];
    use HasFactory;

    public function department()
    {

        //return $this->belongsTo(Departamento::class);
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo(Empleado::class, 'manager_id');
    }

    public function employees()
    {
        return $this->hasMany(Empleado::class, 'manager_id');
    }
}
