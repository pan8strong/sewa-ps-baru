<?php

namespace App\Http\Controllers\Api;

use App\Models\Rental;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        return Rental::with(['customer', 'room'])->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $room = Room::findOrFail($validated['room_id']);
        if (!$room->is_available) {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        $rental = Rental::create([
            'customer_id' => $validated['customer_id'],
            'room_id' => $validated['room_id'],
            'start_time' => now(),
            'status' => 'ongoing',
        ]);

        $room->update(['is_available' => false]);

        return response()->json($rental, 201);
    }

    public function complete($id)
    {
        $rental = Rental::with('room')->findOrFail($id);

        if ($rental->status === 'completed') {
            return response()->json(['message' => 'Rental already completed'], 400);
        }

        $rental->end_time = now();
        $duration = ceil($rental->end_time->diffInMinutes($rental->start_time) / 60);
        $rental->total_price = $duration * $rental->room->hourly_rate;
        $rental->status = 'completed';
        $rental->save();

        $rental->room->update(['is_available' => true]);

        return response()->json($rental);
    }
}

