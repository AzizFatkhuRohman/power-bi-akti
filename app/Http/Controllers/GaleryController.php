<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Galery::latest()->get();
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('galery'), $fileName);
        Galery::create([
            'photo' => $fileName
        ]);
        return back()->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Galery::find($id)->delete();
        return redirect('dashboard')->with('success','Deleted Successfully');
    }
}
