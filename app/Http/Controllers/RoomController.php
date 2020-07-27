<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\Store;
use App\Http\Requests\Room\Update;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $room = new Room();
        return view('rooms.create', compact('room'));
    }

    /**
     * @param Store $request
     * @return Application|Factory|View
     */
    public function store(Store $request)
    {
$room = Room::create($request->all());
        $request->session()->flash('msg', 'Room has been created');

        return view('rooms.edit', compact('room'));
    }

    /**
     * @param Room $room
     * @return Application|Factory|View
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * @param Room $room
     * @return Application|Factory|View
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * @param Update $request
     * @param Room $room
     * @return Application|Factory|
     */
    public function update(Update $request, Room $room)
    {

        $room->update($request->all());
        $request->session()->flash('msg', 'Room has been updated');
        return view('rooms.edit', compact('room'));
    }

    /**
     * @param Room $room
     * @return RedirectResponse
     */
    public function destroy(Room $room)
    {
        Room::destroy($room);
        request()->session()->flash('msg', 'Room has been deleted');
        return redirect()->route('rooms.index');
    }
}
