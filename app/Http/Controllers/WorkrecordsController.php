<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Work;
use App\Models\User;

use Auth;

class WorkrecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        // $works = Work::with('user')->get();
        // $users = User::with('works')->get();

        if ($search != "") {
            $users = User::with('works')->where('fname', 'LIKE', "%$search%")->orWhere('lname', 'LIKE', "%$search%")->get();
            $works = Work::with('user')->get();
        } else {
            $users = User::with('works')->get();
            $works = Work::with('user')->get();
        }

        // $user_id = Auth::user()->id;
        // $user = User::find($user_id);
        // $works = Work::with('user')->get();
        // $users = User::with('works')->get();
        return view ('workrecords.index', compact('works', 'users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select(DB::raw('concat(fname, " ", lname) as full_name'), 'id')->get()->pluck('full_name', 'id');
        return view ('workrecords.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;

        $work = new Work;
        $work->user_id = $request->input('user_id');
        $work->object_id = $request->input('object_id');
        $work->date = $request->input('date');
        $work->hours = $request->input('hours');
        $work->save();

        return redirect('/work');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
