<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class AdminRoomController extends Controller
{
    public function index(): View
    {
        return view('admin.rooms.index', ['rooms' => Room::orderBy('location_key')->orderBy('floor')->orderBy('position')->get()]);
    }

    public function edit(Room $room): View
    {
        $rooms = Room::where('location_key', $room->location_key)
            ->where('floor', $room->floor)
            ->orderBy('position')
            ->get();

        return view('admin.rooms.form', compact('room', 'rooms') + ['title' => 'Edit kamar']);
    }

    public function update(Request $request, Room $room): RedirectResponse
    {
        $room->update($this->validated($request, $room));

        return redirect()->route('admin.rooms.index')->with('success', 'Detail kamar berhasil diperbarui.');
    }

    private function validated(Request $request, Room $room): array
    {
        $data = $request->validate([
            'location_key' => ['required', 'in:tamara-1,tamara-2'],
            'code' => ['required', 'string', 'max:30', Rule::unique('rooms', 'code')->ignore($room->id)->where(fn ($query) => $query->where('location_key', $request->input('location_key'))->where('floor', $room->floor))],
            'type' => ['required', 'in:Standard,Comfort,VIP'],
            'price' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:available,occupied,reserved'],
            'size' => ['required', 'string', 'max:30'],
            'features' => ['nullable', 'array'],
        ]);

        $data['features'] = array_values($data['features'] ?? []);

        return $data;
    }
}