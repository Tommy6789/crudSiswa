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
                            <div class="card-body">
                            <form action=" {{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h1>Data buku</h1>
                                <a type="button" href=" {{ route('buku.index') }} " class="btn btn-info">KEMBALI</a>
                                <br>
                                <label for="">JUDUL</label>
                                <input type="text" name="judul_buku" value="{{ $data->judul_buku }}" class="form-control">
                                <label for="">TAHUN TERBIT</label>
                                <input type="date" name="tahun_terbit" value="{{ $data->tahun_terbit }}" class="form-control">
                                <label for="">ISBN</label>
                                <input type="text" name="isbn" value="{{ $data->isbn }}" class="form-control">
                                <label for="">PENULIS</label>
                                <select name="id_penulis" id="id_penulis" value="{{ $data->nama }}" class="form-control">
                                    <option value="">Penulis</option>
                                    @foreach ($penulis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->id_penulis == $item->id ? 'selected' : ''}}
                                            >
                                            {{$item->nama}} 
                                            
                                        </option>
                                    @endforeach
                                </select>
                                <label for="">GENRE</label>
                                <input type="text" name="genre" value="{{ $data->genre }}" class="form-control">
                                <label for="">PENERBIT</label>
                                <input type="text" name="penerbit" value="{{ $data->penerbit }}" class="form-control">
                                <label for="">TEMPAT TERBIT</label>
                                <input type="text" name="tempat_terbit" value="{{ $data->tempat_terbit }}" class="form-control">
                                <label for="foto">SAMPUL BUKU</label>
                                <input type="file" name="foto" class="form-control">
                                <br>
                                @if($data->foto)
                                    <img src="{{ asset('images/' . $data->foto) }}" alt="{{ $data->judul_buku }} Image" style="max-width: 100px;">
                                @endif
                                <br>
                                <br>
                                <button type="submit" class="btn btn-warning">EDIT</button>
                            </div>
                            </form>
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
@endsection