@extends('admin.header')
<table  id="example1" class="table table-bordered table-striped">
  <thead>
    <tr class="judul">
      <th scope="col">No</th>
      <th scope="col">Jenis</th>
      <th scope="col">Merk</th>
      <th scope="col">Type</th>
      <th scope="col">No Plat</th>
      <th scope="col">Status</th>
      <th scope="col">Foto</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($data as $item)
    <tr>
      <td>{{$loop->iteration}}</td>        
      <td>{{$item->get_jenis->nama}}</td>   
      <td>{{$item->get_merk->nama}}</td>   
      <td>{{$item->get_type->nama}}</td>   
      <td>{{$item->no_plat}}</td>   
      <td>{{$item->status}}</td>   
      <td class="btn-action">
        <div>
            <img src="{{ asset('storage/images/mobil/' . $item->gambar) }}" style="width:80px;height:80px;"></img>
        </div>    
      </td>                                                                       
      <td><button class="btn btn-sm btn-success" value="Edit"  onClick="showedit({{$item->id}})">
        <i class="fas fa-pencil-alt"></i></button>
        <a href="javascript:void(0);" class="delete" data-id="{{ $item->id }}" onClick="deletedata({{$item->id}})">
        <button class="btn btn-sm btn-danger" ><i class="fas fa-calendar-check"></i></button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


