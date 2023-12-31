<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'id_kategori',
        'id_user',
        'deskripsi',
        'jumlah',
        'file',
        'cover',
    ];
    public $timestamps = false;

    public function getKategori() {
        return $this->belongsTo(Kategori::class,'id_kategori', 'id');
    }
    public function getUser() {
        return $this->belongsTo(User::class,'id_user', 'id');
    }
}
