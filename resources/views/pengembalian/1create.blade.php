<div class="p2">

<form id="myform" enctype="multipart/form-data">
   @csrf
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Nama Pelanggan</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="pelanggan" class="form-control" >
         <option value="">--Silahkan Pilih---</option>
            @foreach($peminjaman as $item)
               <option value="{{$item->id}}">{{$item->nama}}</option>
            @endforeach
         </select>
         </div>
      </div>      
      
     
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input class="form-control col-form-input" type="date" id="tanggal_mulai" name="tanggal_mulai" >                              
      @error('tanggal_mulai')
         <div class="alert alert-danger mt-2">
               {{ $message }}
         </div>
      @enderror
         </div>
      </div>

      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Tanggal Akhir</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input class="form-control col-form-input" type="date" id="tanggal_akhir" name="tanggal_akhir" >                              
      @error('tanggal_akhir')
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
