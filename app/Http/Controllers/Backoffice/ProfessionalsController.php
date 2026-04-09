<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    public function index()
    {
        // $professionals = Professional::latest()->paginate(10);
        $professionals = Professional::where('is_active', true)->latest()->get();

        return view('backoffice.professionals.index', compact('professionals'));
    }


}