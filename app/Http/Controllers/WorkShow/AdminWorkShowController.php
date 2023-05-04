<?php

namespace App\Http\Controllers\WorkShow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWorkShowController extends Controller
{
    public function index() {
        return view ('workshow.admin.index');
    }
}
