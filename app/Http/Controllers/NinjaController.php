<?php

namespace App\Http\Controllers;

use App\Models\Dojo;
use App\Models\Ninja;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    public function index() {
        // The pagination method shows part of the get result.
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

        return view('ninjas.index', ["ninjas" => $ninjas]);
    }
    public function show($id) {
        // show(Ninja $ninja)
        // With model binding it looks like this.
        // $ninja->load('dojo');
        // The next line is not needed.
        $ninja = Ninja::with('dojo')->findOrFail($id);

        return view('ninjas.show', ["ninja" => $ninja]);
    }

    public function create() {
        $dojos = Dojo::all();
        return view('ninjas.create', ["dojos" => $dojos]);
    }

    public function store(Request $request) {
        // --> /ninjas/ (POST)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]);

        Ninja::create($validated);

        return redirect()->route('ninjas.index')->with('success', 'Ninja created successfully.');
    }

    public function destroy(Ninja $ninja) {
        // --> /ninjas/{id} (DELETE)
        // When using model binding. Laravel queries the given model (ninja) automatically
        // with the id.
//      // $ninja = Ninja::findOrFail($id);  <-this is then not needed.
        $ninja->delete();

        return redirect()->route('ninjas.index')->with('success', 'Ninja deleted successfully.');
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}
