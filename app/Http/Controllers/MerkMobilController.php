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

class MerkMobilController extends Controller
{
    public function index()
      {
        return view('merkmobil.index');
      }
    public function addmerkmobil()
      {
        return view('merkmobil.create');
      }

    public function savemerkmobil(Request $request)
    {
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $cek = MerkMobil::where('nama','=',$request->nama)->get()->first();;
        $validator = Validator::make($request->all(), [
          'nama'    => 'required',
          ]);
      if($cek){
        return response()->json(['message' => "Merk Mobil Sudah Terdaftar"], 422);
      }
      $data['nama']  = $request->nama; 
      $data['status']  = "aktif";
      $data['created_at']  = $skr;  
      MerkMobil::insert($data);
      return response()->json(['message' => "Merk Mobil  Berhasil Ditambahkan"], 200);
       }

    public function read()
    {

      $data = MerkMobil::all();
      return view('merkmobil.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $data = MerkMobil::findorfail($id);
      return view('merkmobil.showedit')->with(['data'=>$data]);
   }

    // Simpan data Edit
    public function editstore(Request $request, $id)
    {
      $id_user = Auth::user();
      $skr = Carbon::now(); 
      $getfoto = $request->file('gambar');
      $validator = \Validator::make($request->all(), [
        'nama'    => 'required',
        
          ]);
        $data = MerkMobil::findorfail($id);

      $save = $data->update([
        'nama'        => $request->nama,
        'status'      => $request->status,
        'updated_at'  => $skr,
      ]);
      return response()->json(['message' => "Data Berhasil Di Edit"], 200);
    }

    public function destroy(Request $request){
      $id=$request['id'];
      MerkMobil::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
