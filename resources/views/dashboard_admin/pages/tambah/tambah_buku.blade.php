@extends('dashboard_admin.layout.template')

@section('title', 'PWH | Buku')

@section('content')
    <div class="container">
        <h1 class="mb-5">Tambah Buku</h1>

        <form action="{{ route('buku.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group mb-3">
              <label for="judul">Judul Buku:</label>
              <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
        
            <div class="form-group mb-3">
              <label for="id_kategori">Kategori:</label>
              <select class="form-control" id="kategori" name="id_kategori" required>
                @foreach ($kategori as $kat)
                  <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
        
            <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
        
            <div class="form-group mt-3 mb-3">
              <label for="deskripsi">Deskripsi Buku:</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
        
            <div class="form-group mb-3">
              <label for="jumlah">Jumlah:</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
            </div>
        
            <div class="form-group mb-3">
              <label for="file">File Buku (PDF):</label><br>
              <input type="file" class="form-control-file" id="file" name="file" accept=".pdf" required>
            </div>
        
            <div class="form-group mb-3">
              <label for="cover">Cover Buku (JPEG, JPG, PNG):</label><br>
              <input type="file" class="form-control-file" id="cover" name="cover" accept=".jpeg, .jpg, .png" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
@endSection