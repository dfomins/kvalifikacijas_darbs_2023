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
        $notif = Notif::all();
        return view('notifs.index')->with(['notif' => $notif]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Notif::class);
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
        $request->validate(Notif::$rules);
        $this->authorize('create', Notif::class);
        $notif = new Notif;
        $notif->title = $request->input('title');
        $notif->body = $request->input('body');
        $notif->user_id = auth()->user()->id;
        $notif->save();
        return redirect()->route('notifications');
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
        $this->authorize('update', $notif);
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
        $request->validate(Notif::$rules);
        $notif = Notif::find($id);
        $this->authorize('update', $notif);
        $notif->title = $request->input('title');
        $notif->body = $request->input('body');
        $notif->save();
        return redirect()->route('notifications');
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
        $this->authorize('delete', $notif);
        $notif->delete();
        return redirect()->route('notifications');
    }
}
