<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionImag extends Model
{
    use HasFactory;

    public function getImageAttribute($value){
        return url("images/auctions/")."/".$value;

    }

    public function auction()
    {
        return $this->belongsTo(auction::class);
    }
}
