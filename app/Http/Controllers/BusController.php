<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_name' => 'required',
            'plate_number' => 'required',
            'seats' => 'required|integer',
            'bus_type' => 'required',
        ]);

        Bus::create($request->all());

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus created successfully.');
    }

    public function show(Bus $bus)
    {
        return view('admin.buses.show', compact('bus'));
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'bus_name' => 'required',
            'plate_number' => 'required',
            'seats' => 'required|integer',
            'bus_type' => 'required',
        ]);

        $bus->update($request->all());

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus updated successfully');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus deleted successfully');
    }
}
