<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'name',
        'shop_id',
        'price',
        'arrive_shop',
        'image',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
