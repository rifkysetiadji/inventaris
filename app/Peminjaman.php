<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table='peminjaman';
    protected $fillable=[
        'barang_id',
        'pegawai_id',
        'jumlah', 
        'tgl_kembali',
        'created_at'
    ];
}
