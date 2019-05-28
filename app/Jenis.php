<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table='jenis';
    protected $fillable=[
        'jenis',
        'kd_jenis',
        'keterangan'
    ];
}
