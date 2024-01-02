@extends('dashboard_admin.layout.template')

@section('title', 'Admin | Buku')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit Buku</h1>

        <form action={{ route('buku.edit', $buku->id) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
        
            <div class="form-group mb-3">
              <label for="judul">Judul Buku:</label>
              <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
            </div>
        
            <div class="form-group mb-3">
              <label for="id_kategori">Kategori:</label>
              <select class="form-control" id="kategori" name="id_kategori" required>
                @foreach ($kategori as $kat)
                  <option value="{{ $kat->id }}" {{ old('id_kategori', $buku->id_kategori) == $kat->id ? 'selected' : ''}}>{{ $kat->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="judul">User:</label>
                <input type="text" class="form-control" id="id_user" name="id_user" value="{{ $user->getUser->name }}" disabled>
              </div>
        
            <div class="form-group mt-3 mb-3">
              <label for="deskripsi">Deskripsi Buku:</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" value="{{ old('deskripsi', $buku->deskripsi) }}" required>{{ old('deskripsi', $buku->deskripsi) }}</textarea>
            </div>
        
            <div class="form-group mb-3">
              <label for="jumlah">Jumlah:</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="{{ old('jumlah', $buku->jumlah) }}" required>
            </div>
        
            <div class="form-group mb-5">
                <label for="file">File Buku Sebelumnya: {{ old('file', $buku->file) }}</label><br>
                <label for="file">Ubah File Buku (PDF):</label><br>
              <input type="file" class="form-control-file" id="file" name="file" accept=".pdf">
            </div>
        
            <div class="form-group mb-3">
                <label for="file">Cover Buku Sebelumnya:</label><img class="ms-5" width="50px" src="{{ asset('assets/'.$buku->cover) }}" alt=""><br>
              <label for="cover">Cover Buku (JPEG, JPG, PNG):</label><br>
              <input type="file" class="form-control-file" id="cover" name="cover" accept=".jpeg, .jpg, .png">
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
@endSection