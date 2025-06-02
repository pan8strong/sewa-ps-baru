<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(Room::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $room = Room::create(array_merge($data, ['is_available' => true]));

        return response()->json($room, 201);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $data = $request->validate([
            'name'        => 'sometimes|required|string|max:100',
            'hourly_rate' => 'sometimes|required|numeric|min:0',
            'is_available'=> 'sometimes|required|boolean',
        ]);

        $room->update($data);

        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room deleted']);
    }
}

