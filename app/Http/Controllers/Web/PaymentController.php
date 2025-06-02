<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('rental.customer')->simplePaginate(10);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $rentals = Rental::with('customer')->get();
        return view('payments.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rental_id' => 'required',
            'amount_paid' => 'required|numeric',
            'paid_at' => 'required|date',
            'payment_method' => 'nullable|string',
        ]);

        Payment::create($request->only('rental_id', 'amount_paid', 'paid_at', 'payment_method'));


        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function edit(Payment $payment)
    {
        $rentals = Rental::with('customer')->get();
        return view('payments.edit', compact('payment', 'rentals'));
    }


    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'rental_id' => 'required',
            'amount_paid' => 'required|numeric',
            'paid_at' => 'required|date',
            'payment_method' => 'nullable|string',
        ]);

        $payment->update($request->only('rental_id', 'amount_paid', 'paid_at', 'payment_method'));

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}
