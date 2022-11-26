<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clients\ClientStoreRequest;
use App\Http\Requests\Clients\ClientUpdateRequest;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $perPage = $request->per_page ?? 1000;
        $clients = Client::orderBy('created_at', 'DESC')->paginate($perPage);

        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $companies = Company::paginate($perPage ?? 100);

        return view('admin.pages.clients.form', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(ClientStoreRequest $request): RedirectResponse
    {
        $client = Client::create($request->all());

        if ($request->input('companies'))
        {
            $client->companies()->attach($request->input('companies'));
        }

        $request->session()->flash('success', __('Record has been successfully added'));
        return redirect()->route('admin.clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return View
     */
    public function edit(Client $client): View
    {
        $companies = Company::paginate($perPage ?? 100);

        return view('admin.pages.clients.form', [
            'client'    => $client,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return RedirectResponse
     */
    public function update(ClientUpdateRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->all());
        $client->companies()->detach();

        if ($request->input('companies'))
        {
            $client->companies()->attach($request->input('companies'));
        }

        $client->save();
        $request->session()->flash('success', __('Record has been successfully updated'));
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return RedirectResponse
     */
    public function destroy(Request $request, Client $client): RedirectResponse
    {
        $client->delete();

        $request->session()->flash('success', __('Record has been successfully deleted'));
        return redirect()->route('admin.clients.index');
    }
}
