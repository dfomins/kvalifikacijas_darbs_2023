<?php

namespace App\Http\Controllers\WorkRecords;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWorkRecordsController extends Controller
{
    public function index() {
        return view ('workrecords.admin.index');
    }
}
