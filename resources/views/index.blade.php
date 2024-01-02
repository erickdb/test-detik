@extends('template')

@section('title', 'Perpus | Home')

@section('content')
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 row-cols-lg-6 gap-3">
        @foreach ($buku as $bukus)
            <div class="col">
                <div class="card shadow">
                    {{-- <img src="" class="card-img-top" alt="..."> --}}
                    @if ($bukus->cover)
                        <img src="{{ asset('assets/'.$bukus->cover) }}" alt="" class="card-img-top">
                    @else
                        <span class="card-img-top">Cover buku tidak tersedia</span>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($bukus->judul) }}</h5>
                        <p class="card-text">Kategori : {{ ucfirst($bukus->getKategori->nama_kategori) }}</p>

                        @php
                            $originalString = $bukus->deskripsi;
                            $maxCharacters = 50;
                            $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                        @endphp
                        <p class="card-text">{{ ucfirst($truncatedString) }}</p>
                            <a href="{{ route('buku.download', $bukus->file) }}" class="btn btn-primary mb-3">Download</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection