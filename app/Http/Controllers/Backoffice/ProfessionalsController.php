<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    public function index()
    {
        // Fetch professionals from the database (this is just a placeholder, replace with actual model and logic)
        $professionals = [

        ]; // Replace with actual data fetching logic

        return view('backoffice.professionals.index', compact('professionals'));
    }


}
