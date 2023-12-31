<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bukuController extends Controller
{
    public function index()
    {
        $model = buku::join('kategori', 'buku.id_kategori', '=', 'kategori.id')->get();
        $data = [
            "buku" => $model,
        ];
        // dd($model);
        return view("", $data);
    }

    public function showAllBukuDashboard()
    {
        $buku = buku::with('getKategori','getUser')->get();
        return view('dashboard_admin.pages.buku', compact('buku'));
    }
    public function deleteBukuDashboard($id)
    {
        $buku = Buku::find($id);

        if (($buku->file)) {
            $filePath = public_path('assets/' . $buku->file);

            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
        }
        Buku::destroy($buku->id);
        return redirect()->route('buku.dashboard');
    }
    public function viewAddBukuDashboard()
    {
        $kategori = Kategori::all();
        return view('dashboard_admin.pages.tambah.tambah_buku' ,compact('kategori'));
    }
    public function addBukuDashboard(Request $request)
    {
        
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'file' => 'required|mimes:pdf|max:2040800',
            'cover' => 'required|image|mimes:jpeg,jpg,png|max:70000',
        ]);

        

        if (isset($request->file)) {

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/'), $fileName);
            $data['file'] = $fileName;
        }
        if (isset($request->cover)) {

            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/'), $coverName);
            $data['cover'] = $coverName;
        }

        Buku::create([
            'judul' => $data['judul'],
            'id_kategori' => $data['id_kategori'],
            'id_user' => Auth::user()->id,
            'deskripsi' => $data['deskripsi'],
            'jumlah' => $data['jumlah'],
            'file' => isset($request->file) ? $data['file'] : null,
            'cover' => isset($request->cover) ? $data['cover'] : null
        ]);

        return redirect()->route('buku.dashboard')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function downloadFiles(Request $request, $file) {
        $buku = buku::where('file', $file)->first();
        $filebuku = $buku->file;
        $filePath = public_path('assets/'.$filebuku);
        // Set the Content-Disposition header
        $headers = [
            'Content-Disposition' => 'attachment; filename="'.$filebuku.'"',
        ];


        if(file_exists($filePath) && is_file($filePath)) {
            return response()->download($filePath, 'File-buku-'.$filebuku, $headers);
        }
        return redirect()->back();
    }

    public function viewEditBukuDashboard($id)
    {
        $buku = buku::find($id);
        $user = buku::with('getUser')->find($buku->id);
        $kategori = Kategori::all();
        return view('dashboard_admin.pages.edit.edit_buku', compact('buku', 'kategori','user'));
    }

    public function editBukuDashboard(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'file' => 'mimes:pdf|max:2040800',
            'cover' => 'image|mimes:jpeg,jpg,png|max:70000',
        ]);

        $buku = buku::find($id);
        

        if (isset($request->file)) {
            
            $filePath = public_path('assets/' . $buku->file);

            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/'), $fileName);
            $data['file'] = $fileName;
        } else {
            if ($buku->file)
            {
                $data['file'] = $buku->file;
            }
            else 
            {
                $data['file'] = null;
            }
        }

        if (isset($request->cover)) {

            $coverPath = public_path('assets/' . $buku->cover);

            if (file_exists($coverPath) && is_file($coverPath)) {
                unlink($coverPath);
            }

            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/'), $coverName);
            $data['cover'] = $coverName;
        } else {
            if ($buku->cover)
            {
                $data['cover'] = $buku->cover;
            }
            else 
            {
                $data['cover'] = null;
            }
        }

            $buku->judul = $data['judul'];
            $buku->id_kategori = $data['id_kategori'];
            $buku->deskripsi = $data['deskripsi'];
            $buku->jumlah = $data['jumlah'];
            $buku->file = $data['file'];
            $buku->cover = $data['cover'];

            // return dd($buku);
            $buku->save();

        return redirect()->route('buku.dashboard')->with('success', 'Buku berhasil diedit.');
    }
}
