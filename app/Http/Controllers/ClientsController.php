<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\Store;
use App\Http\Requests\Client\Update;
use App\Models\Booking;
use App\Models\Client;
use App\Traits\ImageUpload;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientsController extends Controller
{

use ImageUpload;

    /**
     * @return Application|Factory|
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $client = new Client();
        return view('clients.create', compact('client'));
    }

    /**
     * @param Store $request
     * @return Application|Factory|View
     */
    public function store(Store $request)
    {
        $client = Client::create($request->except('image') + [
                'image' => $this->verifyAndStoreImage($request),
            ]);

        $request->session()->flash('msg', 'Client has been added');

        // Redirect back to Clients
        return view('clients.edit', compact('client'));
    }

    /**
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client)
    {
        $bookings = Booking::where('client_id', $client)->get()->all();
        return view('clients.show', compact('client', 'bookings'));
    }

    /**
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {

        return view('clients.edit', compact('client'));
    }

    /**
     * @param Update $request
     * @param Client $client
     * @return Application|Factory|View
     */
    public function update(Update $request, Client $client)
    {

        if ($request->hasFile('image')) {
            $client->update($request->except('image') + [
                    'image' => $this->verifyAndStoreImage($request),
                ]);
        } else {
            $client->update($request->all());
        }
        request()->session()->flash('msg', 'Client has been updated');
        return view('clients.edit', compact('client'));
    }

    /**
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client)
    {
        Client::destroy($client);
        request()->session()->flash('msg', 'Client has been deleted');
        return redirect()->route('clients.index');
    }
}