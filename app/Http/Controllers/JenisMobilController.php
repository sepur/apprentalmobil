<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\JenisMobil;
use App\Models\MerkMobil;
use App\Models\TypeMobil;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class JenisMobilController extends Controller
{
    public function index()
      {
        return view('jenismobil.index');
      }
    public function addjenismobil()
      {
        return view('jenismobil.create');
      }

    public function savejenismobil(Request $request)
    {
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $cek = JenisMobil::where('nama','=',$request->nama)->get()->first();;
        $validator = Validator::make($request->all(), [
          'nama'    => 'required',
          ]);
      if($cek){
        return response()->json(['message' => "Jenis Mobil Sudah Terdaftar"], 422);
      }
      $data['nama']  = $request->nama; 
      $data['status']  = "aktif";
      $data['created_at']  = $skr;  
      JenisMobil::insert($data);
      return response()->json(['message' => "Jenis Mobil  Berhasil Ditambahkan"], 200);
       }

    public function read()
    {

      $data = JenisMobil::all();
      return view('jenismobil.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $data = JenisMobil::findorfail($id);
      return view('jenismobil.showedit')->with(['data'=>$data]);
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
        $data = JenisMobil::findorfail($id);

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
      JenisMobil::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
