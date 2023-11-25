<div class="p2">

<form id="myform" enctype="multipart/form-data">
   @csrf
   <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Nama</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input type="text" class="form-control" name="nama" oninput="this.value = this.value.toUpperCase()">           
            <!-- error message untuk title -->
            @error('nama')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Alamat</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input type="text" class="form-control" name="alamat" oninput="this.value = this.value.toUpperCase()">           
            <!-- error message untuk title -->
            @error('alamat')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>
      
      
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">No Telepon</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input type="number" class="form-control" name="no_telp" >           
            <!-- error message untuk title -->
            @error('no_telp')
               <div class="alert alert-danger mt-2">
                     {{ $message }}
               </div>
            @enderror
         </div>
      </div>

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Sim</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input type="number" class="form-control" name="no_sim" >           
            <!-- error message untuk title -->
            @error('sim')
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
