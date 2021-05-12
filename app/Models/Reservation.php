<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bedroom;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'checkin',
        'checkout',
        'days',
        'people',
        'room',
    ];

    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class, 'room', 'id');
    }
}
