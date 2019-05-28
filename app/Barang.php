<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barang';
    protected $fillable=[
        'barang',
        'kondisi',
        'keterangan',
        'jumlah',
        'jenis_id',
        'ruang_id',
        'petugas_id',
        'kd_barang'
    ];
}
