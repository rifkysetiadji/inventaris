<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table='keranjang';
    protected $fillable=[
        'barang_id',
        'pegawai_id',
        'jumlah'
    ];
}
