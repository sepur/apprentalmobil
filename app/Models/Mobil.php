<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
	use HasFactory;
	protected $fillable = [
        'fk_jenis',
        'fk_merk',
        'fk_type',
        'no_plat',
        'tarif',
        'status',
		'gambar',
        'ketersediaan',
	];

    public function get_jenis(){ 
        return $this->belongsTo('App\Models\JenisMobil','fk_jenis'); 
    } 
    public function get_merk(){ 
        return $this->belongsTo('App\Models\MerkMobil','fk_merk'); 
    } 
    public function get_type(){ 
        return $this->belongsTo('App\Models\TypeMobil','fk_type'); 
    } 
}
