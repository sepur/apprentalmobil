@extends('welcome')
@section('content')
<!--conten tittle dan bredcrumb -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
	<h1 class="m-0">Projects</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
	  <li class="breadcrumb-item"><a href="#">Home</a></li>
	  <li class="breadcrumb-item active">Projects</li>
	</ol>
      </div>
    </div>
  </div>
</div>
<!-- akhir conten tittle dan bredcrumb -->
<!--conten -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
	  <div class="p-2 mb-2">
        
        <form action="/kal/eksekal" method="POST" enctype="multipart/form-data">
            @csrf
               <div class="mb-4 row row-body">
                  <label class="col-sm-4 col-form-label">Bilangan satu</label>
                  <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
                     <input type="text" oninput="this.value = this.value.toUpperCase()"  class="form-control" name="bil1"
                        value="{{ old('bil1') }}" style="width: 300px;">
                  
                     <!-- error message untuk title -->
                     @error('bil1')
                        <div class="alert alert-danger mt-2">
                              {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="mb-4 row row-body">
                  <label class="col-sm-4 col-form-label">Bilangan 2</label>
                  <div class="col-sm-9 col-md-9 col-lg-10 col-xl-10">
                     <input type="text" class="form-control" name="bil2"
                        value="{{ old('bil2') }}" style="width: 300px;">
                  
                     <!-- error message untuk title -->
                     @error('bil2')
                        <div class="alert alert-danger mt-2">
                              {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>      
         
         
               <div class="col-md-6">
                         <div class="form-group">
                           <label>User</label>
                           <select class="select2bs4"  data-placeholder="Select a State"
                                   style="width: 30%;" name="operan">                                 
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                    <option value="x">X</option>
                                    <option value="/">/</option>
                                   
                           </select>
                         </div>
         
         
         
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" onclick="Close()" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" >Simpan</button>
                  </div>
            </form>
         
            <div class="row">


@if(!empty(Session::get('Info'))) 
    {!! Session::get('Info') !!} 
@endif

</div>  
</div>  

</div>

	  </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Akhir conten -->


@endsection
