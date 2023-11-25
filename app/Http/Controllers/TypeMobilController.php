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

class TypeMobilController extends Controller
{
    public function index()
      {
        return view('typemobil.index');
      }
    public function addtypemobil()
      {
        $data = MerkMobil::all();
        return view('typemobil.create')->with(['data'=>$data]);
      }

    public function savetypemobil(Request $request)
    {
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $cek = TypeMobil::where('nama','=',$request->nama)->get()->first();;
        $validator = Validator::make($request->all(), [
          'nama'    => 'required',
          'fk_merk'  => 'required',
          ]);
      if($cek){
        return response()->json(['message' => "Type Mobil Sudah Terdaftar"], 422);
      }
      $data['nama']  = $request->nama; 
      $data['fk_merk']  = $request->fk_merk; 
      $data['status']  = "aktif";
      $data['created_at']  = $skr;  
      TypeMobil::insert($data);
      return response()->json(['message' => "Type Mobil  Berhasil Ditambahkan"], 200);
       }

    public function read()
    {

      $data = TypeMobil::all();
      return view('typemobil.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $data = TypeMobil::findorfail($id);
      $merk = MerkMobil::findorfail($id);
      return view('typemobil.showedit')->with(['data'=>$data,'merk'=>$merk]);
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
        $data = TypeMobil::findorfail($id);

      $save = $data->update([
        'nama'        => $request->nama,
        'status'      => $request->status,
        'updated_at'  => $skr,
      ]);
      return response()->json(['message' => "Data Berhasil Di Edit"], 200);
    }

    public function destroy(Request $request){
      $id=$request['id'];
      TypeMobil::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
