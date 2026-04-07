<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:admin']);
    // }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('backoffice.users.index', compact('users'));
    }

    public function show($id)
    {
        // Logic to show user details
    }

    public function destroy($id)
    {
        // Logic to delete a user
    }
}
