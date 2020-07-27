<?php

namespace App\Http\Controllers;


use App\Http\Requests\Booking\Store;
use App\Http\Requests\Booking\Update;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $booking = new Booking();
        $clients = Client::all();
        $rooms = Room::where('status', 1)->get();
        return view('bookings.create', compact('clients', 'rooms', 'booking'));
    }

    /**
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    {

        // Save into Database
        Booking::create($request->all());

        // Update Rooms status
        $room = Room::find($request->room_id);
        $room->status = 0;
        $room->save();

        session()->flash('msg', 'The Room Has been booked');

        return redirect()->route('booking.index');
    }

    /**
     * @param Booking $booking
     * @return Application|Factory|View
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * @param Booking $booking
     * @return Application|Factory|View
     */
    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        $clients = Client::all();
        return view('bookings.edit', compact('booking', 'clients', 'rooms'));
    }

    /**
     * @param Update $request
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function update(Update $request, Booking $booking)
    {
        $booking->update($request->all());
        $request->session()->flash('msg', 'Booking has been updated');
        return redirect()->route('booking.index');
    }

    /**
     * @param Request $request
     * @param Booking $booking
     * @return RedirectResponse
     */
    public function destroy(Request $request, Booking $booking)
    {
        Booking::destroy($booking);
        $request->session()->flash('msg', 'Booking has been deleted');
        return redirect()->route('booking.index');
    }

    /**
     * @param $room_id
     * @param $booking_id
     * @return RedirectResponse
     */
    public function cancel($room_id, $booking_id) {
        $booking = Booking::find($booking_id);
        $room = Room::find($room_id);
        $booking->status = 0;
        $room->status = 1;
        $booking->save();
        $room->save();
        session()->flash('msg','Booking has been canceled');
        return redirect()->route('booking.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function canceledBookings() {
        $canceledBookings = Booking::where('status', 0)->get();
        return view('bookings.canceled', compact('canceledBookings'));
    }

}
