<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.routes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'distance' => 'required',
            'duration' => 'required',
        ]);

        Route::create($request->all());

        return redirect()->route('admin.routes.index')
            ->with('success', 'Route created successfully.');
    }

    public function show(Route $route)
    {
        return view('admin.routes.show', compact('route'));
    }

    public function edit(Route $route)
    {
        return view('admin.routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route)
    {
        $request->validate([
            'start_location' => 'required',
            'end_location' => 'required',
            'distance' => 'required',
            'duration' => 'required',
        ]);

        $route->update($request->all());

        return redirect()->route('admin.routes.index')
            ->with('success', 'Route updated successfully');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('admin.routes.index')
            ->with('success', 'Route deleted successfully');
    }
}
