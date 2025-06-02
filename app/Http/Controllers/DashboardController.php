<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Rental;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'customerCount' => Customer::count(),
            'roomCount' => Room::count(),
            'rentalCount' => Rental::count(),
            'paymentCount' => Payment::count(),
        ]);
    }
}
