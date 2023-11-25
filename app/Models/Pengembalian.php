<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
	use HasFactory;
        protected $fillable = [
          'user_id',
          'pelanggan_id',
          'mobil_id',
          'tanggal_mulai',
          'tanggal_akhir',
          'total_hari',
          'total_tagihan',

          
	];

  public function get_pelanggan(){ 
    return $this->belongsTo('App\Models\Pelanggan','pelanggan_id'); 
} 
public function get_mobil(){ 
    return $this->belongsTo('App\Models\Mobil','mobil_id'); 
} 
public function get_user(){ 
    return $this->belongsTo('App\Models\Users','user_id'); 
} 

}
