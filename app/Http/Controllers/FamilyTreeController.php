<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyTreeController extends Controller
{
    function index() {
        return view('family-tree.index');
    }
}