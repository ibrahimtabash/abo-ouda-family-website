<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    function index() {
        $professionals = Professional::latest()->get();
        return view('professionals-directory.index', ['professionals' => $professionals]);
    }

    function show($id) {
        $professional = Professional::findOrFail($id);
        return view('professionals-directory.show', ['professional' => $professional]);
    }
    function create() {
        $professions = Profession::all();

        return view('professional.request.create', compact('professions'));
    }
    function store(Request $request) {
        dd($request->all());
        // Handle storing the new professional
    }
    function edit($id) {
        $professional = Professional::findOrFail($id);
        return view('professionals-directory.edit', ['professional' => $professional]);
    }
    function update(Request $request, $id) {
        // Handle updating the professional
    }
    function destroy($id) {
        // Handle deleting the professional
    }
}