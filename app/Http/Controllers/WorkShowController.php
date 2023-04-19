<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkShowController extends Controller
{
    public function index() {
        return view ('workshow.index');
    }
}
