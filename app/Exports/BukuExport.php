<?php

namespace App\Exports;

use App\Models\buku;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class BukuExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data =  buku::with('getKategori','getUser')->get();

        // Mengembalikan view dengan data
        return view('dashboard_admin.pages.buku_excel', compact('data'));
    }
}
