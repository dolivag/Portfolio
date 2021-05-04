<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'stadium',
        'year',
        'shield',
    ];

    public function localGames()
    {
        return $this->hasMany(Game::class, 'team1', 'id');
    }

    public function visitorGames()
    {
        return $this->hasMany(Game::class, 'team2', 'id');
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'team1', 'id')->orWhere('team2', $this->id);
    }
}
