<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penulis::all();
        return view('buku.create',['penulis'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'judul_buku' => 'required|string',
            'tahun_terbit' => 'required',
            'isbn' => 'required|string',
            'id_penulis' => 'required',
            'genre' => 'required|string',
            'penerbit' => 'required|string',
            'tempat_terbit' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload and save image
        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        // Add the image file name to the validated data
        $validasiData['foto'] = $imageName;

        // Create a new Buku instance with all the validated fields
        $simpan = Buku::create($validasiData);

        return redirect('/buku')->with('success', 'Record created successfully');
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
        $penulis = Penulis::all();
        $data = Buku::findOrFail($id);
        return view('buku.edit', ['data'=>$data,'penulis'=>$penulis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate(
            [
                'judul_buku' => 'required',
                'tahun_terbit' => 'required',
                'isbn' => 'required',
                'id_penulis' => 'required',
                'genre' => 'required',
                'penerbit' => 'required',
                'tempat_terbit' => 'required',
                'foto' => 'required'
            ]
        );

        $data = Buku::findOrFail($id);
        $data->update($validasiData);
        return redirect('/buku')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::FindOrFail($id);
        $data->delete();
        return redirect('/buku')->with('success','Record Deleted Successfully');
    }
}
