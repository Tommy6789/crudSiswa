@extends('siswa.partials.master')

@section('content')
<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Profile</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">User Profile</li>
</ol>
</div>
</div>
</div>
</section>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User profile picture">
</div>
<h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
<p class="text-muted text-center">{{ auth()->user()->role }}</p>
<ul class="list-group list-group-unbordered mb-3">
    @foreach ($data as $item)
    @php
    $no = 1;
    @endphp
    <li class="list-group-item">
    <b>ID Siswa</b> <a class="float-right">{{ $no++ }}</a>
    </li>
    <li class="list-group-item">
    <b>Nama</b> <a class="float-right">{{ $item->nama }}</a>
    </li>
    <li class="list-group-item">
    <b>Tanggal Lahir</b> <a class="float-right">{{$item->tgl_lahir }}</a>
    </li>
    <li class="list-group-item">
    <b>Umur</b> <a class="float-right">{{$item->umur }}</a>
    </li>
    @endforeach
    </ul>
    <a href="{{ route('profile.edit', $item->id) }}" type="button" class="btn btn-warning btn-block">Edit</a>
</div>

</div>


<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">About Me</h3>
</div>

<div class="card-body">
<strong><i class="fas fa-book mr-1"></i> Education</strong>
<p class="text-muted">
B.S. in Computer Science from the University of Tennessee at Knoxville
</p>
<hr>
<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
<p class="text-muted">Malibu, California</p>
<hr>
<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
<p class="text-muted">
<span class="tag tag-danger">UI Design</span>
<span class="tag tag-success">Coding</span>
<span class="tag tag-info">Javascript</span>
<span class="tag tag-warning">PHP</span>
<span class="tag tag-primary">Node.js</span>
</p>
<hr>
<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
</div>

</div>

</div>

<div class="col-md-9">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="activity">

<!-- Activity content goes here -->
</div>
<div class="tab-pane" id="timeline">
<!-- Timeline content goes here -->
</div>
<div class="tab-pane" id="settings">
<!-- Settings content goes here -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
@endsection
