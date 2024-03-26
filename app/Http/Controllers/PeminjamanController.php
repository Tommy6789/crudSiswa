<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PeminjamanBuku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PeminjamanBuku::all();
        $siswa = Siswa::all();
        $buku = Buku::all(); 
        return view('peminjaman.index', ['data'=>$data, 'siswa'=>$siswa, 'buku'=>$buku]);
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
        $validate = $request->validate(
            [
                'id_buku' => 'required',
                'id_siswa' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required'
            ]
            );
    
        PeminjamanBuku::create($validate);

        return redirect('peminjaman')->with('success','Berhasil Melakukan Pinjaman');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bukti_pinjam(string $id)
    {
        $data = PeminjamanBuku::where('id','=',$id)->get();
        return view('pdf.bukti_pinjam',['data'=>$data]);
    }
}
