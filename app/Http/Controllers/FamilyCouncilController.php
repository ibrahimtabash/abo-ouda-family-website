<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyCouncilController extends Controller
{
    function index() {
        return view('family-council.index');
    }
}