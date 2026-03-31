<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessesController extends Controller
{
    function index() {
        return view('businesses.index');
    }
}
