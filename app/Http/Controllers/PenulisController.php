<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penulis::all();
        return view('penulis.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required'
            ]
        );

        $simpan = Penulis::create($validasiData);

        return redirect('/penulis')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Penulis::findOrFail($id);
        return view('penulis.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required'
            ]
        );

        $data = Penulis::findOrFail($id);

        // Update the record with the validated data
        $data->update($validasiData);

        // Redirect to a page or return a response
        return redirect('/penulis')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Penulis::FindOrFail($id);
        $data->delete();
        return redirect('/penulis')->with('success','Record Deleted Successfully');
    }
}
