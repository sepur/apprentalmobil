<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Peminjamen;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PeminjamenController extends Controller
{
    public function index()
      {
        return view('peminjaman.index');
      }
    public function addpeminjaman()
      {
        $pelanggan = Pelanggan::all();
        $mobil = Mobil::where('ketersediaan','=','tersedia')->get();
        return view('peminjaman.create')->with(['pelanggan'=>$pelanggan,'mobil'=>$mobil]);
      }

    public function savepeminjaman(Request $request)
    {
      
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $validator = Validator::make($request->all(), [
          'pelanggan'     => 'required',
          'mobil'         => 'required',
          'tanggal_mulai' => 'required',
          'tanggal_akhir' => 'required',
          ]);
      $data['user_id']  = $id_user->id; 
      $data['pelanggan_id']  = $request->pelanggan;
      $data['mobil_id']  = $request->mobil; 
      $data['tanggal_mulai']  = $request->tanggal_mulai; 
      $data['tanggal_akhir']  = $request->tanggal_akhir; 
      $data['created_at']  = $skr;  
      Peminjamen::insert($data);
      
      $mbl = Mobil::where('id',$request->mobil)->get()->first();
      $mbl->ketersediaan = "Penuh";
      $mbl->save();
      return response()->json(['message' => "Data Peminjaman Berhasil Ditambahkan"], 200);
       }

    public function read()
    {
     
      $data = Peminjamen::all();
      return view('peminjaman.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $pelanggan = Pelanggan::all();
      $mobil = Mobil::all();
      $data = Peminjamen::findorfail($id);
      return view('peminjaman.showedit')->with(['data'=>$data,'pelanggan'=>$pelanggan,'mobil'=>$mobil]);
   }

    // Simpan data Edit
    public function editstore(Request $request, $id)
    {
      $id_user = Auth::user();
      $skr = Carbon::now(); 
      $validator = Validator::make($request->all(), [
          'pelanggan'     => 'required',
          'mobil'         => 'required',
          'tanggal_mulai' => 'required',
          'tanggal_akhir' => 'required',
          ]);
          $data = Peminjamen::findorfail($id);

          $save = $data->update([
            'user_id'    => $id_user->id,
            'pelanggan_id'     =>  $request->pelanggan,
            'mobil_id'     =>$request->mobil,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_akhir'       => $request->tanggal_akhir,
            'status'      => $request->status,
            'updated_at'  => $skr,
            ]);


      
      $mbl = Mobil::where('id',$request->mobil)->get()->first();
      $mbl->ketersediaan = "Penuh";
      $mbl->save();
      return response()->json(['message' => "Data Berhasil Di Edit"], 200);
    }

    public function destroy(Request $request){
      $id=$request['id'];
      Peminjamen::where('id', $id)->delete();
      return response()->json([
      'success' => 'Record deleted successfully!'
      ]);
  
  }    
}
