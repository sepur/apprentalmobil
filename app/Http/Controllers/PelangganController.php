<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\JenisMobil;
use App\Models\MerkMobil;
use App\Models\TypeMobil;
use App\Models\Pelanggan;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function index()
      {
        return view('pelanggan.index');
      }
    public function addpelanggan()
      {
        return view('pelanggan.create');
      }

    public function savepelanggan(Request $request)
    {
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $cek = Pelanggan::where('no_sim','=',$request->no_sim)->get()->first();;
        
        $validator = Validator::make($request->all(), [
          'nama'    => 'required',
          'alamat'  => 'required',
          'no_telp' => 'required',
          'no_sim'  => 'required',
          ]);
      if($cek){
        return response()->json(['message' => "Nomor Sim Sudah Terdaftar"], 422);
      }

      $data['nama']  = $request->nama; 
      $data['alamat']  = $request->alamat;
      $data['no_telp']  = $request->no_telp; 
      $data['no_sim']  = $request->no_sim; 
      $data['status']  = "Aktif";  
      $data['created_at']  = $skr;  
      $getfoto = $request->file('gambar');
      Pelanggan::insert($data);
      return response()->json(['message' => "Data Pengguna Berhasil Ditambahkan"], 200);
       }

    public function read()
    {

      $data = Pelanggan::all();
      return view('pelanggan.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $data = Pelanggan::findorfail($id);
      return view('pelanggan.showedit')->with(['data'=>$data]);
   }

    // Simpan data Edit
    public function editstore(Request $request, $id)
    {
      $id_user = Auth::user();
      $skr = Carbon::now(); 
      $getfoto = $request->file('gambar');
      $validator = \Validator::make($request->all(), [
        'nama'    => 'required',
        'alamat'  => 'required',
        'no_telp' => 'required',
        'no_sim'  => 'required',
        'status'  => 'required',
          ]);
        $data = Pelanggan::findorfail($id);

      $save = $data->update([
        'nama'        => $request->nama,
        'alamat'      =>$request->alamat,
        'no_telp'     => $request->no_telp,
        'no_sim'      =>$request->no_sim,
        'status'      => $request->status,
        'updated_at'  => $skr,
      ]);
      return response()->json(['message' => "Data Berhasil Di Edit"], 200);
    }

    public function destroy(Request $request){
      $id=$request['id'];
      Pelanggan::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
