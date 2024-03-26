<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['id_siswa','nama','tgl_lahir','umur'];

    public function siswa()
    {
        return $this->hasMany(PeminjamanBuku::class, 'id','id_buku');
    }
}
