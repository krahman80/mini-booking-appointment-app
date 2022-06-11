<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function getStartAttribute($value) {
        return substr($value, 0, -3);
    }

    public static function generateTicket()
    {
        return Str::random(40);
    }
}
