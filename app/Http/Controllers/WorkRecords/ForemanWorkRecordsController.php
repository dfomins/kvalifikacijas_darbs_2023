<?php

namespace App\Http\Controllers\WorkRecords;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForemanWorkRecordsController extends Controller
{
    public function index() {
        return view ('workrecords.foreman.index');
    }
}
