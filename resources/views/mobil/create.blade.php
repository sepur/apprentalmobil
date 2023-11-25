<div class="p2">

<form id="myform" enctype="multipart/form-data">
   @csrf
   <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Model</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="fk_jenis" class="form-control" >
         <option value="">--Silahkan Pilih---</option>
            @foreach($jenis as $item)
               <option value="{{$item->id}}">{{$item->nama}}</option>
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
         <option value="">--Silahkan Pilih---</option>
            @foreach($merk as $item)
               <option value="{{$item->id}}">{{$item->nama}}</option>
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
         <option value="">--Silahkan Pilih---</option>
            @foreach($type as $item) 
               <option value="{{$item->id}}">{{$item->nama}}</option>
            @endforeach
         </select>
         </div>
      </div>    

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">No Plat</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name="no_plat" value="{{ old('no_plat') }}">
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
            <input type="text" class="form-control" name="tarif" value="{{ old('tarif') }}">
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
         <input type="file" accept="image/png, image/gif, image/jpeg"
         class="form-control" name="gambar" > 
            <!-- error message untuk title -->
            @error('dokumen')
                  <div class="alert alert-danger mt-2">
                     {{ $message }}
                  </div>
            @enderror
         </div>
      </div>   
      
      </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="Close()" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
         </div>
   </form>
   
   
   
</div>
