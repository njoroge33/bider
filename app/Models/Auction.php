<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'image',
        'actual_price',
        'bidding_price',
        'end_date',
        'description'
    ];

    public function auction_bid()
    {
        return $this->hasMany(Bid::class);
    }
}
