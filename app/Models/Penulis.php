<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat','tanggal_lahir'];

    public function buku(){
        return $this->hasMany(Buku::class,'id','id_penulis');
    }
}
