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
        return view('buku.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penulis::all();
        return view('buku.create', ['penulis' => $data]);
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
        $imageName = time() . '.' . $request->foto->extension();
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
        return view('buku.edit', ['data' => $data, 'penulis' => $penulis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Buku::findOrFail($id);

        // Check if a new image file is provided
        if ($request->hasFile('foto')) {
            $validasiData = $request->validate([
                'judul_buku' => 'required|string',
                'tahun_terbit' => 'required',
                'isbn' => 'required|string',
                'id_penulis' => 'required',
                'genre' => 'required|string',
                'penerbit' => 'required|string',
                'tempat_terbit' => 'required|string',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Update validation rule for image
            ]);

            // Delete the previous image file if it exists
            if ($data->foto) {
                unlink(public_path('images/' . $data->foto));
            }

            // Upload and save the new image
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);

            $validasiData['foto'] = $imageName;

            $data->update($validasiData);
        } else {
            // If no new image, update other fields without changing the existing image
            $data->update($request->except('foto'));
        }

        return redirect('/buku')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);

        // Check if the foto attribute exists and the image file exists
        if ($data->foto && file_exists(public_path('images/' . $data->foto))) {
            unlink(public_path('images/' . $data->foto)); // Delete the image file
        }

        $data->delete();

        return redirect('/buku')->with('success', 'Record Deleted Successfully');
    }
}
