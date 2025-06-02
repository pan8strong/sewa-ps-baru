<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Customer;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::simplePaginate(10);
        return view('rooms.index', compact('rooms'));
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
            'name' => 'required',
            'status' => 'required|in:available,unavailable',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruang berhasil ditambahkan');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:available,unavailable',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruang berhasil diperbarui');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruang berhasil dihapus');
    }
}
