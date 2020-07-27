<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Dashboard;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $client = new Client();
        $room = new Room();
        $booking  = new Booking();
        return view('dashboard', compact('client','room','booking'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Dashboard $dashboard)
    {
        //
    }

    public function edit(Dashboard $dashboard)
    {
        //
    }

    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
