<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectsUsers;
use App\Models\User;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class KalkulatorController extends Controller
{
    public function index()
      {
        return view('kal.index');
        #$usr = User::all();
        #return view('pro.create1',compact('usr')); 
      }
   

    public function eksekal(Request $request)
    {
        $validator = Validator::make($request->all(), [
	      'bil1' => 'required',
        'bil2' => 'required',
        'operan' => 'required',
      ]);
        $result 		 = 0;
       if($request->operan ="+"){
        $result = $request->bil1 + $request->bil2;
       }      
       if($request->operan ="-"){
        $result = $request->bil1 - $request->bil2;
       }      
       if($request->operan ="x"){
        $result = $request->bil1 * $request->bil2;
       }      
       if($request->operan ="/"){
        $result = $request->bil1 / $request->bil2;
       }      
       Session::put('alert', ['Hasilnya adalah : '.$result]);
       return redirect()->route('kal.index')->with(['alert', 'Hasilnya adalah : '.$result]);
       }

}
