<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        return view('profile.index', ['data'=> $data]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user(); // Fetch the currently authenticated user
        return view('profile.index', compact('user'));
        //Retrive the record to be updated
        $data = Siswa::findOrFail($id);
        //Pass the data to the edit view
        return view('profile.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //Retrive the record to be updated
        $data = Siswa::findOrFail($id);
         //Pass the data to the edit view
        return view('profile.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate(
            [
                'id_siswa' => 'required',
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'umur' => 'required'
            ]
        );

        // Find the record to be updated
        $data = Siswa::findOrFail($id);

        // Update the record with the validated data
        $data->update($validasiData);

        // Redirect to a page or return a response
        return redirect('profile')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
