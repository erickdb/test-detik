@extends('dashboard_admin.layout.template')

@section('title', 'PWH | Kategori')

@section('content')
    <div class="container">
        <h1 class="mb-5">Kategori</h1>
        <div class="d-flex mb-3">
            <a href="{{ route('kategori.view.add') }}" class="btn btn-primary ms-auto">Tambah</a>
        </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($allCategories as $row)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ ucfirst($row->nama_kategori) }}</td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <a href="" class=""><i
                                        class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>

                                <form class="delete" method="POST" action={{ route('kategori.delete',['id' => $row->id]) }}
                                    id="deleteKategoriForm{{ $row->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-none p-0">
                                        <i class="bi bi-trash3-fill" data-toggle="tooltip" title="Delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection