@extends('siswa.partials.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
    <h1>DataTables</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">DataTables</li>
    </ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @php
                $no = 1;
            @endphp
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Peminjaman
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Peminjaman</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('peminjaman.store') }}" method="post">
                            @csrf
                            <label for="">Siswa</label>
                            <select class="form-control" name="id_siswa">
                                <option value="">Pilih Siswa</option>
                                @foreach ($siswa as $i)
                                    <option value="{{ $i->id }}">{{ $i->nama }}<option>
                                @endforeach
                            </select>

                            <label for="">Buku</label>
                            <select class="form-control" name="id_buku">
                                <option value="">Pilih Buku</option>
                                @foreach ($buku as $i)
                                    <option value="{{ $i->id }}">{{ $i->judul_buku }}<option>
                                @endforeach
                            </select>

                            <label for="">Tanggal Pinjam</label>
                            <input class="form-control" type="date" name="tanggal_pinjam">

                            <label for="">Tanggal Kembali</label>
                            <input class="form-control" type="date" name="tanggal_kembali">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                                    
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Judul</th>
                    <th>Periode Peminjaman</th>
                    <th>Penulis</th>
                    <th>Sampul</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->siswa->nama }}</td>
                            <td>{{ $item->buku->judul_buku }}</td>
                            <td>{{ $item->tanggal_pinjam."-".$item->tanggal_kembali }} </td>
                            <td>{{ $item->buku->penulis->nama }} </td>
                            <td><img src="{{ asset('images/' . $item->buku->foto) }}" alt="{{ $item->judul_buku }} Image" width="60" height="60"></td>
                            <td>
                                <form action="{{ route('buku.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('peminjaman.bukti_pinjam', $item->id) }}" type="button"
                                        class="btn btn-warning">Bukti Pinjam</a>
                                    <button type="submit" class="btn btn-danger">Kembali</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection