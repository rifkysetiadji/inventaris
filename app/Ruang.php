<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table='ruang';
    protected $fillable=[
        'ruang',
        'kd_ruang',
        'keterangan'
    ];
}
