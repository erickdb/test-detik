@extends('dashboard_admin.layout.template')

@section('title', 'Admin | Buku')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit Kategori</h1>

        <form action={{ route('kategori.edit', $kategori->id) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
        
            <div class="form-group mb-3">
              <label for="nama_kategori">Nama Kategori:</label>
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
@endSection