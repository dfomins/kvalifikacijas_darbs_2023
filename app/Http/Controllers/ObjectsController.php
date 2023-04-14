<?php

namespace App\Http\Controllers;

use App\Models\WorkObject;
use App\Models\User;

use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = WorkObject::orderBy('created_at', 'asc')->get();
        return view('objects.index')->with('objects', $objects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', WorkObject::class);
        return view ('objects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(WorkObject::$rules);
        $this->authorize('create', WorkObject::class);
        $object = new WorkObject;
        $object->title = $request->input('title');
        $object->city = $request->input('city');
        $object->street = $request->input('street');
        $object->body = $request->input('body');

        if ($request->hasfile('object_img')) {
            $file = $request->file('object_img');
            $img = ImageManagerStatic::make($file)->encode('jpg');
            $filename = time() . '.jpg';
            Storage::put('public/images/objects/'.$filename, $img);
            $object->object_img = $filename;
        }

        $object->save();

        return redirect()->route('objects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkObject  $workObject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $object = WorkObject::find($id);
        return view('objects.show')->with(['object' => $object, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkObject  $workObject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = WorkObject::find($id);
        $this->authorize('update', $object);
        return view('objects.edit')->with('object', $object);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkObject  $workObject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkObject $workObject)
    {
        $request->validate(WorkObject::$rules);
        $this->authorize('update', $object);
        $object = WorkObject::find($id);
        $object->title = $request->input('title');
        $object->city = $request->input('city');
        $object->street = $request->input('street');
        $object->body = $request->input('body');

        if ($request->hasfile('object_img')) {
            if ($object->object_img != 'no_photo.png') {
                $destination = 'public/images/objects/'.$object->object_img;
                if(Storage::exists($destination)) {
                    Storage::delete($destination);
                }
            }
            $file = $request->file('object_img');
            $img = ImageManagerStatic::make($file)->encode('jpg');
            $filename = time() . '.jpg';
            Storage::put('public/images/objects/'.$filename, $img);
            $object->object_img = $filename;
        }

        $object->update();

        return redirect()->route('objects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkObject  $workObject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = WorkObject::find($id);
        $this->authorize('delete', $object);
        $object->delete();
        return redirect()->route('objects');
    }
}
