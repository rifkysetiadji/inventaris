<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use App\Ruang;
use App\Petugas;
use App\Pegawai;
use App\User;
use App\Barang;
use Validator;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
// use Carbon;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public static function autonumber($table,$primary,$awal){
        $noAkhir=$table::count($primary);
        $no=0;
        if($noAkhir){
            $kd=$awal.sprintf('-'.abs($noAkhir+1));
        }else{
            $kd=$awal.sprintf('-'.abs($no+1));
        }
        return $kd;
    }

    public function list_jenis(){
        $title="Jenis";
        
        $list_jenis=Jenis::all();
        // return $kd_jenis;
        return view('admin.jenis.index',compact('list_jenis','title'));
    }

    public function add_jenis(Request $req){
            if($req->jenis=="" || $req->keterangan==""  ){
                return redirect('/jenis')->with(['errors'=>'Jenis atau keterangan tidak boleh kosong']);
            }else{
                $table='App\Jenis';
                $primary='id';
                $awal="JN";
                $kd_jenis=$this->autonumber($table,$primary,$awal);
                $data= new Jenis;
                $data->jenis=$req->jenis;
                $data->kd_jenis=$kd_jenis;
                $data->keterangan=$req->keterangan;
                $data->save();
                return redirect('/jenis');
            }
           
       
        
    }
    public function update_jenis(Request $req){
        $rules = array(
            'jenis' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        }else{
            $data=Jenis::find($req->id);
            $data->jenis=$req->jenis;
            $data->kd_jenis=$req->kd_jenis;
            $data->keterangan=$req->keterangan;
            $data->save();
            return response()->json($data);
        }
        
    }
    public function delete_jenis(Request $req){
        $data=Jenis::find($req->id);
        $data->delete();
        return response()->json($data);
    }

    public function list_ruang(){
        $list_ruang=Ruang::all();
        $title="Ruang";
        return view('admin.ruang.index',compact('list_ruang','title'));
    }
    public function add_ruang(Request $req){
        $table='App\Ruang';
        $primary='id';
        $awal="RNG";
        $kd=$this->autonumber($table,$primary,$awal);
        $data=new Ruang;
        $data->ruang=$req->ruang;
        $data->kd_ruang=$kd;
        $data->keterangan=$req->keterangan;
        $data->save();
        return redirect('/ruang');
    }
    public function update_ruang(Request $req){
        $rules = array(
            'ruang' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        }else{
            $data=Ruang::find($req->id);
            $data->ruang=$req->ruang;
            $data->kd_ruang=$req->kd_ruang;
            $data->keterangan=$req->keterangan;
            $data->save();
            return response()->json($data);
        }
    }
    public function delete_ruang(Request $req){
        $data=Ruang::find($req->id);
        $data->delete();
        return response()->json($data);
    }

    public function list_petugas(){
        $list_petugas=User::all();
        $title="Petugas";
        return view('admin.petugas.index',compact('list_petugas','title'));
    }
    public function add_petugas(Request $req){
        $data=new User;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->username=$req->username;
        $data->password=Hash::make($req->password);
        $data->level=$req->level;
        $data->save();
        return redirect('/petugas');
    }
    public function update_petugas(Request $req){
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->username=$req->username;
        $data->password=$req->password;
        $data->level=$req->level;
        $data->save();
        return response()->json($data);
    }
    public function delete_petugas(Request $req){
        $data=User::find($req->id);
        $data->delete();
        return response()->json($data);
    }

    public function list_pegawai(){
        $list_pegawai=Pegawai::all();
        $title="pegawai";
        return view('admin.pegawai.index',compact('list_pegawai','title'));
    }
    public function add_pegawai(Request $req){
        $data=new Pegawai;
        $data->name=$req->name;
        $data->nip=$req->nip;
        $data->alamat=$req->alamat;
        $data->username=$req->username;
        $data->password=$req->password;
        $data->save();
        return redirect('/pegawai');
    }
    public function update_pegawai(Request $req){
        $data=Pegawai::find($req->id);
        $data->name=$req->name;
        $data->nip=$req->nip;
        $data->alamat=$req->alamat;
        $data->username=$req->username;
        $data->password=$req->password;
        $data->save();
        return response()->json($data);
    }
    public function delete_pegawai(Request $req){
        $data=Pegawai::find($req->id);
        $data->delete();
        return response()->json($data);
    }


    public function list_barang(){
        $list_barang=Barang::all();
        $list_jenis=Jenis::all();
        $list_ruang=Ruang::all();
        $title="barang";
        return view('admin.barang.index',compact('list_barang','title','list_jenis','list_ruang'));
    }
    public function add_barang(Request $req){
        if($req->barang=="" || $req->jumlah < 1 ){
            return redirect('/barang')->with(['errors'=>'isi field dengan benar']);
        }else{
            $table='App\Barang';
            $primary='id';
            $awal="BR";
            $kd=$this->autonumber($table,$primary,$awal);
            $data=new Barang;
            $data->barang=$req->barang;
            $data->kondisi=$req->kondisi;
            $data->keterangan=$req->keterangan;
            $data->jumlah=$req->jumlah;
            $data->jenis_id=$req->jenis_id;
            $data->ruang_id=$req->ruang_id;
            $data->petugas_id=Auth::user()->id;
            $data->kd_barang=$kd;
            $data->save();
            return redirect('/barang');
        }
        
    }
    public function update_barang(Request $req){
        $data=Barang::find($req->id);
        $data->barang=$req->barang;
        $data->kondisi=$req->kondisi;
        $data->keterangan=$req->keterangan;
        $data->jumlah=$req->jumlah;
        $data->jenis_id=$req->jenis_id;
        $data->ruang_id=$req->ruang_id;
        $data->petugas_id=Auth::user()->id;
        $data->kd_barang=$req->kd_barang;
        $data->save();
        return response()->json($data);
    }
    public function delete_barang(Request $req){
        $data=Barang::find($req->id);
        $data->delete();
        return response()->json($data);
    }
    public function add_keranjang(Request $req){
        // $data= new Keranjang;
        // $data->barang_id=$req->barang_id;
        // $data->pegawai_id=session()->get('pegawai');
        // $data->jumlah=$req->jumlah;
        // $data->save(); 
        return response()->json($req);
    }
}
