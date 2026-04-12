<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyTreeController extends Controller
{
    // function index() {
    //     return view('family-tree.index');
    // }
    public function index()
    {
        $tree = \App\Models\FamilyMember::whereNull('parent_id')
            ->with('childrenRecursive')
            ->first();

        return view('family-tree.index', compact('tree'));
    }
}
