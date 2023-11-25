<div class="p2">
<form id="myform" enctype="multipart/form-data">
   @csrf
   <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Nama Pelanggan</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="pelanggan" class="form-control" >
         @foreach ($pelanggan as $pt)
            <option value="{{ $pt->id }}" {{ $pt->id == $data->pelanggan_id  ? 'selected' :''}}>{{ $pt->nama }}</option>
         @endforeach
         </select>
         </div>
      </div>      
      
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Mobil</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <select name="mobil" class="form-control" >
         <option value="">--Silahkan Pilih---</option>
            @foreach($mobil as $item)
               <option value="{{ $item->id }}" {{ $item->id == $data->mobil_id  ? 'selected' :''}}>{{$item->no_plat}}-{{$item->get_jenis->nama}}-{{$item->get_merk->nama}}-{{$item->get_jenis->nama}}-{{$item->get_type->nama}}</option>
            @endforeach
         </select>
         </div>
      </div>
     
      <div class="mb-2 row row-body">
         <label class="col-sm-4 col-form-label">Tanggal Mulai</label>
         <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
         <input class="form-control col-form-input" type="date" value="{{$data->tanggal_mulai}}" name="tanggal_mulai" >                              
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
         <input class="form-control col-form-input" type="date" value="{{$data->tanggal_akhir}}" name="tanggal_akhir" >                              
      @error('tanggal_akhir')
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
