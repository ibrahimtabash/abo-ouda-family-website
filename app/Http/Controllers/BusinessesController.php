<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class BusinessesController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return view('businesses.index', compact('companies'));
    }
}
