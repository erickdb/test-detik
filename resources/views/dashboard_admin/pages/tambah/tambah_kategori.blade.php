@extends('dashboard_admin.layout.template')

@section('title', 'Admin | Kategori')

@section('content')
    <div class="container">
        <h1 class="mb-5">Tambah Kategori</h1>

        <form action="{{ route('kategori.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group mb-3">
              <label for="nama_kategori">Nama Kategori:</label>
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endSection