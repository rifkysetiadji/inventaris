<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\q_peminjaman;
use App\q_booking;
use App\Barang;
use App\Booking;
use App\Pegawai;
use App\Peminjaman;
class PetugasController extends Controller
{
    public function list_peminjaman(){
        $title='Peminjaman';
        $list_peminjaman=q_peminjaman::all();
        $list_booking=q_booking::all()->where('status','=','Belum');
        $list_barang=Barang::all()->where('jumlah','>','0');
        $list_pegawai=Pegawai::all();
        return view('petugas.peminjaman.index',compact('list_peminjaman','list_booking','title','list_barang','list_pegawai'));
    }
    public function add_peminjaman(Request $req){
        
        $data= new Peminjaman;
        $data->barang_id=$req->barang_id;
        $data->pegawai_id=$req->pegawai_id;
        $data->jumlah=$req->jumlah;
        $data->tujuan=$req->tujuan;
        $data->tgl_kembali=$req->tgl_kembali;
        $data->created_at=$req->tgl_pinjam;
        $data->save();
        return redirect('/peminjaman');
    }
    public function kembali_peminjaman(Request $req){
        $data=Peminjaman::find($req->id);
        $data->delete();
        return response()->json($data);
    }
    public function update_peminjaman(Request $req){
        $data=Peminjaman::find($req->id);
        $data->tgl_kembali=$req->tgl_kembali;
        $data->save();
        $peminjaman=q_peminjaman::find($data->id);
        return response()->json($peminjaman);
    }
    public function acc_booking(Request $req){
        $data=Booking::find($req->barang_id);
        $data->status="Oke";
        $data->save();
        $data= new Peminjaman;
        $data->barang_id=$req->barang_id;
        $data->pegawai_id=$req->pegawai_id;
        $data->jumlah=$req->jumlah;
        $data->tujuan=$req->tujuan;
        $data->tgl_kembali=$req->tgl_kembali;
        $data->created_at=$req->tgl_pinjam;
        $data->save();
        return redirect('/peminjaman');
        // return $req;
    }
}
