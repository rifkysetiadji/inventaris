<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='booking';
    protected $fillable=[
        'barang_id',
        'pegawai_id',
        'tujuan',
        'jumlah',
        'tgl_kembali',
        'status'
    ];
}
