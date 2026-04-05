<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    function index() {
        return view('professionals-directory.index');
    }

    function show($id) {
        return view('professionals-directory.show', ['id' => $id]);
    }
    function create() {
        return view('professionals-directory.create');
    }
    function store(Request $request) {
        // Handle storing the new professional
    }
    function edit($id) {
        return view('professionals-directory.edit', ['id' => $id]);
    }
    function update(Request $request, $id) {
        // Handle updating the professional
    }
    function destroy($id) {
        // Handle deleting the professional
    }
}
