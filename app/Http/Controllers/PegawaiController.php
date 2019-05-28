<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Keranjang;
use App\Booking;
use App\q_barang;
use App\q_booking;
use Illuminate\Support\Facades\Session;
class PegawaiController extends Controller
{
    public function peglogin(Request $request){
        $data=Pegawai::where([
            'username'=>$request->username,
            'password'=>$request->password
        ])->get();
        if($data->count()>0){
            Session::put('pegawai',$data[0]->id);
            // return session()->get('pegawai');
            return redirect('/pegawaihome');
        }else{
            return redirect('/logpegawai')->with(['errors'=>'Username / password salah']);
        }
    }
    public function peglogout(){
        Session::flush();
        return redirect('/logpegawai');
    }
   
    public function home(){
        $list_barang=q_barang::all()->where('jumlah','>','0');
        $list_booking=q_booking::all()->where('pegawai_id','=',session()->get('pegawai'));
        return view('pegawai.home',compact('list_barang','list_booking'));
    }
    

    public function add_booking(Request $req){
        if($req->tgl_kembali<$req->tgl_pinjam ){
            return response()->json('errors');
        }else{
            $data= new Booking;
            $data->barang_id=$req->barang_id;
            $data->pegawai_id=session()->get('pegawai');
            $data->tujuan=$req->tujuan;
            $data->jumlah=$req->jumlah;
            $data->tgl_pinjam=$req->tgl_pinjam;
            $data->tgl_kembali=$req->tgl_kembali;
            $data->status="Belum";
            $data->save();
            $booking=q_booking::find($data->id);
            return response()->json($booking);
        }
        
        // return $req;
    }
    public function cancel_booking(Request $req){
        $data=Booking::find($req->id);
        $data->delete();
        return response()->json($data);
    }
    public function filter_booking(Request $req){
        $data=q_booking::whereBetween('tgl_pinjam',[$req->datefrom,$req->dateto])->get();
        return response()->json($data);
    }
}
