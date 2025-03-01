<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AllUsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('pages.users')->with('users', $users);
    }
}
