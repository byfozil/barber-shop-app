<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'barber_id',
        'booking_date',
        'booking_time',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
