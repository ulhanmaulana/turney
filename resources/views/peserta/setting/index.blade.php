@extends('layouts.layoutpeserta')


@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/berita">Payment</a></li>
              <li class="breadcrumb-item active">Konfirmasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col-md-12 -->
          <div class="col-lg-12">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"></h3>
                  <!-- <th><a href="/admin/berita/tambah" type="button" class="btn btn-primary">TAMBAH</a></th> -->
                </div>
              </div>
              <div class="card-body">
              <form  action="{{url('/peserta/setting/simpan')}}" method="POST" >
        				{{ csrf_field() }}

                        <div class="form-group">
        				<b>Password Baru</b>
                            <input type="password" name="pass_new" id="pass_new" class="form-control" placeholder="min 8 Karakter" onkeyup="cekJmlPass();" >
                            <small id="passlength-valid" hidden="true" style="color: red;">Password kurang panjang!</small>
                        </div>
                        <div class="form-group">
        				<b>Ulangi Password Baru</b>
                            <input type="password" name="re_pass" id="re_pass" class="form-control" placeholder="" onkeyup="cekPassword();" >
        					<small id="pass-valid" hidden="true" style="color: red;">Password tidak sama!</small>
                        </div>
                        <div class="form-group">
        				    <input class="btn btn-danger btn-sm" type=button id="show" value="Show Password" onclick="ShowPassword()">
                            <input  class="btn btn-danger btn-sm" type=button style="display:none" id="hide" value="Hide Password" onclick="HidePassword()">
                        </div>
                        

        				<div class="float-sm-right">
                        <input type="submit" value="Simpan" id="simpan" class="btn btn-primary" disabled="true">  
                        </div> 
        				
      			   </form>
              

                
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    
<script>

function cekJmlPass(){
    pass=document.getElementById("pass_new").value;
    if(pass.length < 8){
        document.getElementById("passlength-valid").removeAttribute("hidden");
    }
    else{
        document.getElementById("passlength-valid").setAttribute("hidden", "true");
    }

}

function cekPassword(){
   // alert(document.getElementById("pass_new").value);
    pass_1=document.getElementById("pass_new").value;
    pass_2=document.getElementById("re_pass").value;
    if(pass_2 != pass_1){
        document.getElementById("pass-valid").removeAttribute("hidden");
        document.getElementById("simpan").setAttribute("disabled", "true");
    }
    else{
        document.getElementById("pass-valid").setAttribute("hidden", "true");
        document.getElementById("simpan").removeAttribute("disabled");

    }
   
}
function ShowPassword()
{
	if(document.getElementById("pass_new").value!="")
	{
		document.getElementById("pass_new").type="text";
        document.getElementById("re_pass").type="text";
		document.getElementById("show").style.display="none";
		document.getElementById("hide").style.display="block";
	}
}

function HidePassword()
{
	if(document.getElementById("pass_new").type == "text")
	{
		document.getElementById("pass_new").type="password";
        document.getElementById("re_pass").type="password";
		document.getElementById("show").style.display="block";
		document.getElementById("hide").style.display="none";
	}
}
</script>
@endsection
