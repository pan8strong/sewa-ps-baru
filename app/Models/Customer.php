<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

