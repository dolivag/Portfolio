<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Game extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'stadium',
        'team1',
        'result1',
        'team2',
        'result2',
    ];


    public function local()
    {
        return $this->belongsTo(Team::class, 'team1', 'id');
    }

    public function visitor()
    {
        return $this->belongsTo(Team::class, 'team2', 'id');
    }
}
