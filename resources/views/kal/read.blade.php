@extends('admin.header')
<table  id="example1" class="table table-bordered table-striped">
  <thead>
    <tr class="judul">
      <th scope="col">No</th>
      <th scope="col">Nama Project</th>
      <th scope="col">Tanggal Project</th>
      <th scope="col">Status</th>
      <th scope="col">User</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($data as $item)
    <tr>
      <td>{{$loop->iteration}}</td>        
      <td>{{$item->nama_project}}</td>   
      <td>{{$item->tanggal_project}}</td>   
      <td>{{$item->status}}</td> 
     
      <td> 
      @foreach($item->users as $aa)
      
      {{$aa->user_id}},
     
      @endforeach
      </td>    
      
      
      <td><button class="btn btn-sm btn-success" value="Edit"  onClick="showedit({{$item->id}})">
        <i class="fas fa-calendar-check"></i></button>
        <a href="javascript:void(0);" class="delete" data-id="{{ $item->id }}" onClick="deletedata({{$item->id}})">
        <button class="btn btn-sm btn-danger" ><i class="fas fa-calendar-check"></i></button></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


