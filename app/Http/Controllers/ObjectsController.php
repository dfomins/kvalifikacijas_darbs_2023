<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WorkObject;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
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

        $request->validate([
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);

        $object = new WorkObject;
        $object->title = $request->input('title');
        $object->city = $request->input('city');
        $object->street = $request->input('street');
        $object->body = $request->input('body');
        if ($request->hasfile('object_img')) {
            $file = $request->file('object_img');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/objects', $filename);
            $object->object_img = $filename;
        }
        $object->save();

        return redirect('/objects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = WorkObject::find($id);
        return view('objects.show')->with('object', $object);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = WorkObject::find($id);
        if (auth()->user()->role !==1) {
            return redirect('/objects');
        }
        return view('objects.edit')->with('object', $object);
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
        $object = WorkObject::find($id);
        $object->title = $request->input('title');
        $object->city = $request->input('city');
        $object->street = $request->input('street');
        $object->body = $request->input('body');
        if ($request->file != '') {

            if ($object->file != '' && $object->file != null) {
                $file_old = $file.$object->file;
                unlink($file_old);
            }

            $file = $request->file;
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/objects', $filename);

            $object->update(['file' => $filename]);
        }
        
        $object->save();

        return redirect('/objects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = WorkObject::find($id);
        if (auth()->user()->role !==1) {
            return redirect('/objects');
        }
        $object->delete();
        return redirect('/objects');
    }
}
