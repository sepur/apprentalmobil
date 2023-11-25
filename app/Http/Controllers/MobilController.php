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
class MobilController extends Controller
{
    public function index()
      {
        return view('mobil.index');
      }
    public function addmobil()
      {
        $jenis = JenisMobil::all();
        $merk = MerkMobil::all();
        $type = TypeMobil::all();
        return view('mobil.create')->with(['jenis'=>$jenis,'merk'=>$merk,'type'=>$type]);
      }

    public function savemobil(Request $request)
    {
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $cek = Mobil::where('no_plat','=',$request->no_plat)->get()->first();;
        
        $validator = Validator::make($request->all(), [
          'fk_jenis'  => 'required',
          'fk_merk' => 'required',
          'no_plat' => 'required',
          'fk_type'  => 'required',
          'tarif'  => 'required',
        ]);
      if($cek){
        return response()->json(['message' => "Nomor Plat Sudah Terdaftar"], 422);
      }

      $data['fk_jenis']  = $request->fk_jenis; 
      $data['fk_merk']  = $request->fk_merk;
      $data['no_plat']  = $request->no_plat; 
      $data['fk_type']  = $request->fk_type; 
      $data['tarif']  = $request->tarif; 
      $data['status']  = "Aktif";  
      $data['ketersediaan'] = 'tersedia';
      $data['created_at']  = $skr;  
      $getfoto = $request->file('gambar');

      
      if ($getfoto) {
        $foto_name = time().'_'.$getfoto->getClientOriginalName();
        $filePath = $getfoto->storeAs('images/mobil', $foto_name);


        // $foto_name = time().'_'.$getfoto->getClientOriginalName();
        // $getfoto->storeAs('public/mobil', $getfoto);
        // // $filePath = $getfoto->storeAs('public/mobil', $getfoto);
        $data['gambar']  = $foto_name;
      }
      Mobil::insert($data);
      return response()->json(['message' => "Data Berhasil Ditambahkan"], 200);
       }

    public function read()
    {

      $data = Mobil::all();
      return view('mobil.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $data = Mobil::findorfail($id);
      $jenis = JenisMobil::all();
      $merk = MerkMobil::all();
      $type = TypeMobil::all();
      return view('mobil.showedit')->with(['data'=>$data,'jenis'=>$jenis,'merk'=>$merk,'type'=>$type]);
   }

    // Simpan data Edit
    public function editstore(Request $request, $id)
    {
      $id_user = Auth::user();
      $skr = Carbon::now(); 
      $getfoto = $request->file('gambar');
      $validator = \Validator::make($request->all(), [
          'fk_jenis'  => 'required',
          'fk_merk' => 'required',
          'no_plat' => 'required',
          'fk_type'  => 'required',
          'tarif'  => 'required',
          ]);
        $data = Mobil::findorfail($id);

      $save = $data->update([
      'fk_jenis'    => $request->fk_jenis,
      'fk_merk'     => $request->fk_merk,
      'no_plat'     => $request->no_plat, 
      'fk_type'     => $request->fk_type, 
      'tarif'       => $request->tarif,
      'status'      => $request->status,
      'ketersediaan'=> 'tersedia',
      'updated_at'  => $skr,
      ]);

      if ($getfoto) {
        $foto_name = time().'_'.$getfoto->getClientOriginalName();
        $filePath = $getfoto->storeAs('images/mobil', $foto_name);
        $data->gambar  = $foto_name;
        $data->save();
      }

      return response()->json(['message' => "Data Berhasil Di Edit"], 200);
    }

    public function destroy(Request $request){
      $id=$request['id'];
      Mobil::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
