<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hourly_rate', 'is_available'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

