<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function showAllBuku(){
        $kategori = Kategori::all();
        $buku = buku::with('getKategori')->orderBy('id', 'desc')->get();
        return view('index', compact('buku','kategori'));
    }
    public function showBukuByCategory($kategoris){

        // metode closure where has
        $buku = buku::with('getKategori')
        ->whereHas('getKategori', function ($kat) use ($kategoris) {
            $kat->where('nama_kategori', $kategoris);
        })
        ->orderBy('id', 'desc')->get();

        // metode join
        // $buku = Buku::join('kategori', 'buku.id_kategori', '=', 'kategori.id')
        //         ->select('buku.*', 'kategori.nama_kategori as nama_kategori')
        //         ->where('kategori.nama_kategori', $kategoris)
        //         ->orderBy('buku.id', 'desc')
        //         ->get();
        
        $kategori = Kategori::all();
            return view('buku_by_kategori', compact('buku', 'kategori'));
    }
}
