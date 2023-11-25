<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dasboard" class="brand-link">
      <img src="{{asset('lte/dist/img/transindo.png')}}" alt="Jasmed" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Transindo Data Perkasa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="fa fa-bars" aria-hidden="true"></i>
              <p>
              Menus
                
              </p>
            </a>
	  </li>
    <li class="nav-item menu-open">
            <a href="/jenismobil/index" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
              <p>
              Jenis Mobil
                
              </p>
            </a>
	  </li>
    <li class="nav-item menu-open">
            <a href="/merkmobil/index" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
              <p>
              Merk Mobil
                
              </p>
            </a>
	  </li>
    <li class="nav-item menu-open">
            <a href="/typemobil/index" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
              <p>
              Type Mobil
                
              </p>
            </a>
	  </li>
          <li class="nav-item menu-open">
            <a href="/mobil/index" class="nav-link">
            <i class="nav-icon fa fa-address-card"></i>
              <p>
              Tambah Mobil
                
              </p>
            </a>
	  </li>
           <!-- <li class="nav-item menu-open">
            <a href="/usr/index" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
              <p>
              Add User
              </p>
            </a>
          </li> -->
          
          <li class="nav-item menu-open">
            <a href="/pelanggan/index" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
              <p>
              Pengguna
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="/peminjaman/index" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
              <p>
              Peminjaman Mobil
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="/pengembalian/index" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
              <p>
              Pengembalian Mobil
              </p>
            </a>
          </li>

          

        <style>
   

    .kotak {
        /*width: 320px;*/
        background-color: white;
        /*margin: 120px auto;*/
        width: 220px;
        height: 500px;
        left:0;
        margin-top:100px;
        overflow:auto;
    }


    #inputLabel {
        height: 120px;
        font-size: 40px;
        vertical-align: bottom;
        text-align: right;
        padding-right: 16px;
        background-color: #ececec;
    }
</style>

<div class="kotak">
    <table border="1" cellspacing="0" style="width:50%;width: 100%; border-color: #f4f4f4; overflow:none;">
      <div >
        <tr>
            <td style="width: 25%"  colspan="4" id="inputLabel">0</td>
        </tr>
      </div>
        <tr>
            <td style="width: 25%"  colspan="3"><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">Clear All</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">/</button></td>
        </tr>
        <tr>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">7</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">8</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">9</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">*</button></td>
        </tr>
        <tr>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">4</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">5</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">6</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">-</button></td>
        </tr>
        <tr>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">1</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">2</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">3</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">+</button></td>
        </tr>
        <tr>
            <td style="width: 25%"  colspan="2"><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">0</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">.</button></td>
            <td style="width: 25%" ><button style="width:100%;height:70px;font-size:24px;background-color:white;border:none;" onclick="pushBtn(this);">=</button></td>
        </tr>
    </table>
</div>
 
<script>
var inputLabel = document.getElementById('inputLabel');
function pushBtn(obj) {
var pushed = obj.innerHTML;
if (pushed == '=') {
    // Calculate
    inputLabel.innerHTML = eval(inputLabel.innerHTML);
} else if (pushed == 'Clear All') {
    // All Clear
    inputLabel.innerHTML = '0';
} else {
    if (inputLabel.innerHTML == '0') {
        inputLabel.innerHTML = pushed;
    } else {
        inputLabel.innerHTML += pushed;   
    }
}
}
</script>
</ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
