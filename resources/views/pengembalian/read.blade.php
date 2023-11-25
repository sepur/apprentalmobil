@extends('admin.header')
<table  id="example1" class="table table-bordered table-striped">
  <thead>
    <tr class="judul">
      <th scope="col">No</th>
      <th scope="col">Nama Pengguna</th>
      
      <th scope="col">Mobil</th>
      <th scope="col">No Plat</th>
      <th scope="col">Tarif</th>
      <th scope="col">Awal pinjam</th>
      <th scope="col">Akhir Pinjam</th>
      <th scope="col">Lama Pinjam</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($data as $item)
    <tr>
      <td>{{$loop->iteration}}</td>        
      <td>{{$item->get_pelanggan->nama}}</td> 
      <td>{{$item->get_mobil->get_type->nama}}</td> 
      <td>{{$item->get_mobil->no_plat}}</td> 
      <td>{{$item->get_mobil->tarif}}</td> 
      <td>{{$item->tanggal_mulai}}</td> 
      <td>{{$item->tanggal_akhir}}</td> 
      <td>{{$item->total_hari}}</td> 
      <td>{{$item->total_tagihan}}</td> 
                                                                     
      <td><button class="btn btn-sm btn-success" value="Edit"  onClick="showedit({{$item->id}})">
        <i class="fas fa-pencil-alt"></i></button>
        <a href="javascript:void(0);" class="delete" data-id="{{ $item->id }}" onClick="deletedata({{$item->id}})">
        <button class="btn btn-sm btn-danger" ><i class="fas fa-calendar-check"></i></button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


