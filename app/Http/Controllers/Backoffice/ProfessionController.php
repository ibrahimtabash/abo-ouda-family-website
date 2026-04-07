<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = Profession::all();
        return view('backoffice.professions.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.professions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:professions,name',
        ],
        [
            'name.unique' => 'المهنة موجودة بالفعل!'
        ]
        );

        // save the new profession to the database
        Profession::create($validated);
        return redirect()->route('professions.index')->with('success', 'Profession created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profession = Profession::findOrFail($id);

        return view('backoffice.professions.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profession = Profession::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('professions', 'name')->ignore($id),
            ],
        ], [
            'name.unique' => 'المهنة موجودة بالفعل!',
        ]);

        $profession->update($validated);

        return redirect()->route('professions.index')
            ->with('success', 'Profession updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();

        return redirect()->route('professions.index');
    }
}