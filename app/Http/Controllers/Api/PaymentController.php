<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('rental')->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'amount_paid' => 'required|numeric|min:0',
        ]);

        $rental = Rental::findOrFail($validated['rental_id']);
        if ($rental->status !== 'completed') {
            return response()->json(['message' => 'Rental must be completed before payment'], 400);
        }

        $payment = Payment::create([
            'rental_id' => $rental->id,
            'amount_paid' => $validated['amount_paid'],
            'paid_at' => now(),
        ]);

        return response()->json($payment, 201);
    }
}

