<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notif;
use App\Models\User;

class NotifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $notifs = Notif::orderBy('created_at', 'desc')->get();
        return view('notifs.index')->with('notifs', $notifs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('notifs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notif = new Notif;
        $notif->title = $request->input('title');
        $notif->body = $request->input('body');
        $notif->user_id = auth()->user()->id;
        $notif->save();

        return redirect('notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notif = Notif::find($id);
        if (auth()->user()->id !==$notif->user_id) {
            return view('notifs.show-nonc')->with('notif', $notif);
        }
        return view('notifs.show')->with('notif', $notif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notif = Notif::find($id);
        if (auth()->user()->role !==1) {
            return redirect('/notifications');
        }
        return view('notifs.edit')->with('notif', $notif);
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
        $notif = Notif::find($id);
        $notif->title = $request->input('title');
        $notif->body = $request->input('body');
        $notif->save();

        return redirect('/notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notif = Notif::find($id);
        if (auth()->user()->role !==1) {
            return redirect('/notifications');
        }
        $notif->delete();
        return redirect('/notifications');
    }
}
