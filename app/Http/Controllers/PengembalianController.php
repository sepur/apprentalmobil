<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Peminjamen;
use App\Models\Pengembalian;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PengembalianController extends Controller
{
    public function index()
      {
        return view('pengembalian.index');
      }

    public function addpengembalian($id)
      {
        $peminjaman = Peminjamen::find($id);
        $tarif = Mobil::find($peminjaman->mobil_id);
        
        $skr =  Carbon::now()->format('Y-m-d');
        $mulai = $peminjaman->tanggal_mulai;
        $lamapinjam = Carbon::parse($skr)->diffInDays($mulai);
        $totalharga = $lamapinjam * $tarif->tarif;
        // dd($mulai,$skr,$selisihHari);
        return view('peminjaman.createkembali')->with(['peminjaman'=>$peminjaman,'lamapinjam'=>$lamapinjam,'totalharga'=>$totalharga ]);
      }

    public function savepengembalian(Request $request,$id)
    {
      
        $id_user = Auth::user();
        $skr =  Carbon::now();
        $validator = Validator::make($request->all(), [
          'totalhari'     => 'required',
          'totalharga'         => 'required',
          ]);
      
      $pinjam = Peminjamen::where('id',$id)->get()->first();
      $peminjam = $pinjam->pelanggan_id;
      // dd($pinjam->pelanggan_id);
      $data['user_id']  = $id_user->id; 
      $data['pelanggan_id']  = $pinjam->pelanggan_id;
      $data['mobil_id']  = $pinjam->mobil_id; 
      $data['tanggal_mulai']  = $pinjam->tanggal_mulai; 
      $data['tanggal_akhir']  = $skr ;
      $data['total_hari']   = $request->totalhari;
      $data['total_tagihan'] = $request->totalharga;
      $data['created_at']  = $skr;  
      Pengembalian::insert($data);

    //   Pengembalian::create([       
    //     'user_id'  => $id_user->id, 
    //     'pelanggan_id'  => $pinjam->pelanggan_id,
    //     'mobil_id'  => $pinjam->mobil_id, 
    //     'tanggal_mulai'  => $pinjam->tanggal_mulai, 
    //     'tanggal_akhir'  => $skr ,
    //     'total_hari'   => $request->totalhari,
    //     'total_tagihan' => $request->totalharga,
    //     'created_at'  => $skr,  

    // ]);
      return response()->json(['message' => "Data Peminjaman Berhasil Ditambahkan"], 200);
       }

    public function read()
    {
     
      $data = Pengembalian::all();
      return view('pengembalian.read')->with(['data'=>$data]);
    }
    public function showedit($id)
    {
      $pelanggan = Pelanggan::all();
      $mobil = Mobil::all();
      $data = Peminjamen::findorfail($id);
      return view('pengembalian.showedit')->with(['data'=>$data,'pelanggan'=>$pelanggan,'mobil'=>$mobil]);
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
