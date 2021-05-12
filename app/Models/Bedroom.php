<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Bedroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomNumber',
        'capacity',
        'price',
    ];

    protected $appends = ['is_cheaper'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'room', 'id');
    }

    public function getIsCheaperAttribute()
    {
        $bedrooms = Bedroom::where('capacity', $this->capacity)->get();
        foreach ($bedrooms as $bedroom) {
            if ($bedroom->price < $this->price) {
                return false;
                break;
            }
        }
        return true;
    }
}
