<?php

namespace App\Http\Controllers\WorkShow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserWorkShowController extends Controller
{
    public function index() {
        return view ('workshow.user.index');
    }
}
