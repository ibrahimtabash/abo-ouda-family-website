<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyHistoryController extends Controller
{
    function index()  {
        return view('family-history.index');
    }
}