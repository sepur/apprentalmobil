<div class="p2">
<form id="myform" enctype="multipart/form-data">
   @csrf
   <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Model</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="fk_jenis" class="form-control" >
         @foreach ($jenis as $pt)
            <option value="{{ $pt->id }}" {{ $pt->id == $data->fk_jenis  ? 'selected' :''}}>{{ $pt->nama }}</option>
         @endforeach
         </select>
          
            <!-- error message untuk title -->
            @error('model')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Merk</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="fk_merk" class="form-control" >
         @foreach ($merk as $item)
            <option value="{{ $item->id }}" {{ $item->id == $data->fk_merk  ? 'selected' :''}}>{{ $item->nama }}</option>
         @endforeach
         </select>
           <!-- error message untuk title -->
            @error('merk')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      
      
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Type</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="fk_type" class="form-control" >
         @foreach ($type as $item)
            <option value="{{ $item->id }}" {{ $item->id == $data->fk_type  ? 'selected' :''}}>{{ $item->nama }}</option>
         @endforeach
         </select>
         </div>
      </div>    

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">No Plat</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name="no_plat" value="{{ $data->no_plat}}">
            <!-- error message untuk title -->
            @error('no_plat') 
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>      


      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Tarif</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10"> 
            <input type="text" class="form-control" name="tarif" value="{{ $data->tarif }}">
            <!-- error message untuk title -->
            @error('tarif')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>   
      
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Foto</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input type="file" class="form-control form-control-sm col-form-input mb-2 " name="gambar">
            <h5 class="file-before mb-2 ">File Before : 
               <a href= '/storage/images/mobil/{{$data->gambar}}' class='btn btn-info btn-down btn-sm' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Download' target ='blank'>{{$data->gambar}}</a>
              <br> (Field Document biarkan kosong jika tidak akan di update.)
            </h5> 
       
            <!-- error message untuk title -->
            @error('dokumen')
                  <div class="alert alert-danger mt-2">
                     {{ $message }}
                  </div>
            @enderror
         </div>
      </div>   

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Status</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="status" class="form-control" >
         
            <option value="Aktif" {{ $data->status == "Aktif"  ? 'selected' :''}}>Aktif</option>
            <option value="NonAktif" {{ $data->status == "NonAktif"  ? 'selected' :''}}>NonAktif</option>
         
         </select>
         </div>
      </div>    


	 </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="Close()" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="editstore({{$data->id}})">Simpan</button>
         </div>
   </form>
</div>
