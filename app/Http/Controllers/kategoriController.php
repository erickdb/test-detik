<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $allCategories = Kategori::all();
        return view('dashboard_admin.pages.kategori', compact('allCategories'));
    }

    public function deleteKategoriDashboard($id)
    {
        $kategori = Kategori::find($id);
        Kategori::destroy($kategori->id);
        return redirect()->route('kategori.dashboard');
    }
    public function viewAddKategoriDashboard()
    {
        return view('dashboard_admin.pages.tambah.tambah_kategori');
    }
    public function addKategoriDashboard(Request $request)
    {
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.dashboard')->with('success', 'kategori berhasil ditambahkan.');
    }
}
