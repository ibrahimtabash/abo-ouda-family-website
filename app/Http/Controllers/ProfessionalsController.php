<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessionalsController extends Controller
{
    function index() {
        return view('professionals-directory.index');
    }
}