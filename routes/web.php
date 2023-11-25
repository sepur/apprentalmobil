<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PeminjamenController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\JenisMobilController;
use App\Http\Controllers\MerkMobilController;
use App\Http\Controllers\TypeMobilController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\KalkulatorController;

#Tanpa Auth
Route::get('/', function () {
	return view('auth.login');
});
Route::get('/login', [LoginController::class, 'perform'])->name('login');
Route::post('/perform', [LoginController::class, 'perform'])->name('perform');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [DasboardController::class, 'registrasi'])->name('registrasi');
Route::post('/saveregis', [DasboardController::class, 'saveregis'])->name('saveregis');

#auth midelware
Route::group(['middleware' => ['auth']], function () {
    ##Dasboard
    Route::get('/dasboard', [DasboardController::class, 'index'])->name('dasboard');

    ###CRUD JEnis Mobil
    Route::get('/jenismobil/index', [JenisMobilController::class, 'index'])->name('jenismobil.index');
    Route::get('/jenismobil/read', [JenisMobilController::class, 'read'])->name('jenismobil.read');
    Route::get('/jenismobil/addjenismobil', [JenisMobilController::class, 'addjenismobil'])->name('jenismobil.addjenismobil');
    Route::post('/jenismobil/savejenismobil', [JenisMobilController::class, 'savejenismobil'])->name('jenismobil.savejenismobil');
    Route::get('/jenismobil/showedit/{id}', [JenisMobilController::class, 'showedit'])->name('jenismobil.showedit');
    Route::post('/jenismobil/editstore/{id}', [JenisMobilController::class, 'editstore'])->name('jenismobil.editstore');
    Route::post('/jenismobil/destroy/{id}', [JenisMobilController::class, 'destroy'])->name('jenismobil.destroy');


    ###CRUD Merk Mobil
    Route::get('/merkmobil/index', [MerkMobilController::class, 'index'])->name('merkmobil.index');
    Route::get('/merkmobil/read', [MerkMobilController::class, 'read'])->name('merkmobil.read');
    Route::get('/merkmobil/addmerkmobil', [MerkMobilController::class, 'addmerkmobil'])->name('merkmobil.addmerkmobil');
    Route::post('/merkmobil/savemerkmobil', [MerkMobilController::class, 'savemerkmobil'])->name('merkmobil.savemerkmobil');
    Route::get('/merkmobil/showedit/{id}', [MerkMobilController::class, 'showedit'])->name('merkmobil.showedit');
    Route::post('/merkmobil/editstore/{id}', [MerkMobilController::class, 'editstore'])->name('merkmobil.editstore');
    Route::post('/merkmobil/destroy/{id}', [MerkMobilController::class, 'destroy'])->name('merkmobil.destroy');

    ###CRUD Merk Mobil
    Route::get('/typemobil/index', [TypeMobilController::class, 'index'])->name('typemobil.index');
    Route::get('/typemobil/read', [TypeMobilController::class, 'read'])->name('typemobil.read');
    Route::get('/typemobil/addtypemobil', [TypeMobilController::class, 'addtypemobil'])->name('typemobil.addtypemobil');
    Route::post('/typemobil/savetypemobil', [TypeMobilController::class, 'savetypemobil'])->name('typemobil.savetypemobil');
    Route::get('/typemobil/showedit/{id}', [TypeMobilController::class, 'showedit'])->name('typemobil.showedit');
    Route::post('/typemobil/editstore/{id}', [TypeMobilController::class, 'editstore'])->name('typemobil.editstore');
    Route::post('/typemobil/destroy/{id}', [TypeMobilController::class, 'destroy'])->name('typemobil.destroy');

    
    ##CRUD Mobil
    Route::get('/mobil/index', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/addmobil', [MobilController::class, 'addmobil'])->name('mobil.addmobil');
    Route::post('/mobil/savemobil', [MobilController::class, 'savemobil'])->name('mobil.savemobil');
    Route::get('/mobil/read', [MobilController::class, 'read'])->name('mobil.read');
    Route::get('/mobil/showedit/{id}', [MobilController::class, 'showedit'])->name('mobil.showedit');
    Route::post('/mobil/editstore/{id}', [MobilController::class, 'editstore'])->name('mobil.editstore');
    Route::post('/mobil/destroy/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');

    
    Route::get('/usr/index', [UserController::class, 'index'])->name('usr.index');
    Route::get('/usr/adduser', [UserController::class, 'adduser'])->name('usr.adduser');
    Route::post('/usr/saveuser', [UserController::class, 'saveuser'])->name('usr.saveuser');
    Route::get('/usr/read', [UserController::class, 'read'])->name('usr.read');
    Route::get('/usr/showedit/{id}', [UserController::class, 'showedit'])->name('usr.showedit');
    Route::post('/usr/editstore/{id}', [UserController::class, 'editstore'])->name('usr.editstore');
    Route::post('/usr/destroy/{id}', [UserController::class, 'destroy'])->name('usr.destroy');

    ###CRUD Pelanggan
    Route::get('/pelanggan/index', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/read', [PelangganController::class, 'read'])->name('pelanggan.read');
    Route::get('/pelanggan/addpelanggan', [PelangganController::class, 'addpelanggan'])->name('pelanggan.addpelanggan');
    Route::post('/pelanggan/savepelanggan', [PelangganController::class, 'savepelanggan'])->name('pelanggan.savepelanggan');
    Route::get('/pelanggan/showedit/{id}', [PelangganController::class, 'showedit'])->name('pelanggan.showedit');
    Route::post('/pelanggan/editstore/{id}', [PelangganController::class, 'editstore'])->name('pelanggan.editstore');
    Route::post('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    
    ###CRUD Peminjaman
    Route::get('/peminjaman/index', [PeminjamenController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/read', [PeminjamenController::class, 'read'])->name('peminjaman.read');
    Route::get('/peminjaman/addpeminjaman', [PeminjamenController::class, 'addpeminjaman'])->name('peminjaman.addpeminjaman');
    Route::post('/peminjaman/savepeminjaman', [PeminjamenController::class, 'savepeminjaman'])->name('peminjaman.savepeminjaman');
    Route::get('/peminjaman/showedit/{id}', [PeminjamenController::class, 'showedit'])->name('peminjaman.showedit');
    Route::post('/peminjaman/editstore/{id}', [PeminjamenController::class, 'editstore'])->name('peminjaman.editstore');
    Route::post('/peminjaman/destroy/{id}', [PeminjamenController::class, 'destroy'])->name('peminjaman.destroy');
    
     ###CRUD Pengembalian
     Route::get('/pengembalian/index', [PengembalianController::class, 'index'])->name('pengembalian.index');
     Route::get('/pengembalian/read', [PengembalianController::class, 'read'])->name('pengembalian.read');
     Route::get('/pengembalian/addpengembalian/{id}', [PengembalianController::class, 'addpengembalian'])->name('pengembalian.addpengembalian');
     Route::post('/pengembalian/savepengembalian/{id}', [PengembalianController::class, 'savepengembalian'])->name('pengembalian.savepengembalian');
     Route::get('/pengembalian/showedit/{id}', [PengembalianController::class, 'showedit'])->name('pengembalian.showedit');
     Route::post('/pengembalian/editstore/{id}', [PengembalianController::class, 'editstore'])->name('pengembalian.editstore');
     Route::post('/pengembalian/destroy/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');

    Route::get('/kal/index', [KalkulatorController::class, 'index'])->name('kal.index');
    Route::post('/kal/eksekal', [KalkulatorController::class, 'eksekal'])->name('kal.eksekal');
    

});
