<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('customer', 'room')->simplePaginate(10);
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $customers = Customer::all();
        $rooms = Room::where('is_available', true)->get();

        return view('rentals.create', compact('customers', 'rooms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Rental::create($request->all());
        Room::where('id', $request->room_id)->update(['is_available' => false]);

        return redirect()->route('rentals.index')->with('success', 'Peminjaman berhasil dilakukan');
    }

    public function edit(Rental $rental)
    {
        $customers = Customer::all();
        $rooms = Room::all();
        return view('rentals.edit', compact('rental', 'customers', 'rooms'));
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $rental->update($request->all());
        return redirect()->route('rentals.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy(Rental $rental)
    {
        Room::where('id', $rental->room_id)->update(['is_available' => true]);

        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
