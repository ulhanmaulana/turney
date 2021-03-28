@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')
<section id="" class="">
      <div class="container" data-aos="fade-up">


      	
        	
        

      	<div class="row row-cols-3 justify-cntent-center align-items-center mb-1">
      		<div class="col-lg-4 mx-auto">
				<img src="{{ asset('upcoming/coba.jpg') }}" class="rounded" height="200vh" width="100%" >
			</div>
		</div>
		<div align="center">
			<h1 style="color: orange">Nama Turnament</h1>          	
		</div>
		

		


      	<div class="row" align="center">
      		<div class="col-lg-6 mx-auto" style="border : 0px solid black" >
      			
		      	<ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist" >
				  <li class="nav-item" role="presentation" > 
				    <button class="nav-link active btn btn-outline-warning btn-sm"  data-bs-toggle="pill" data-bs-target="#pills-deskripsi" type="button" role="tab" aria-controls="pills-deskripsi" aria-selected="true">Deskripsi</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link btn btn-outline-warning btn-sm"  data-bs-toggle="pill" data-bs-target="#pills-peraturan" type="button" role="tab" aria-controls="pills-peraturan" aria-selected="false">Peraturan</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link btn btn-outline-warning btn-sm"  data-bs-toggle="pill" data-bs-target="#pills-peserta" type="button" role="tab" aria-controls="pills-peserta" aria-selected="false">Peserta</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link btn btn-outline-warning btn-sm"  data-bs-toggle="pill" data-bs-target="#pills-klasemen" type="button" role="tab" aria-controls="pills-klasemen" aria-selected="false">Klasemen</button>
				  </li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
				  <div class="tab-pane fade show active" id="pills-deskripsi" role="tabpanel" aria-labelledby="pills-deskripsi-tab">
				  	<table class="table table-borderless table-warning">
					  	<tr>
					  		<td>Biaya Pendaftaran</td>
					  		<td>Slot</td>
					  	</tr>
					  	<tr>
					  		<td>Tempat</td>
					  		<td>Sistem Turnament</td>
					  	</tr>
					  	<tr>
					  		<td colspan="2">Kategori</td>
					  	</tr>
					  	<tr style="border-top: solid 1px white" align="center">
					  		<td><h2>HADIAH</h2></td>
					  		<td><a class="btn btn-outline-warning btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Daftar </a></td>
					  	</tr>

				  	</table>
				  </div>

				  <div class="tab-pane fade" id="pills-peraturan" role="tabpanel" aria-labelledby="pills-peraturan-tab">
				  	
				  	
				  </div>
				  <div class="tab-pane fade" id="pills-peserta" role="tabpanel" aria-labelledby="pills-peserta-tab">...</div>
				  <div class="tab-pane fade" id="pills-klasemen" role="tabpanel" aria-labelledby="pills-klasemen-tab">...</div>
				</div>

			</div>
		</div>


      
  </section>
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header justify-content-center">
		        <h3 class="modal-title" id="staticBackdropLabel">Form Pendaftaran</h3>
		        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
		      </div>
		      <div class="modal-body">
		        <div class="row">
                  <div class="form-group col-sm-5">
                  	<input type="input" name="" class="form-control" required="" placeholder="Nama Tim">
                  </div>
                  <!-- <div class="form-group col-sm-7 ms-auto">
                  	Logo <input type="file" name="file_gambar" required="">
                  </div> -->
                  <div class="custom-file col-4">
					  <input type="file" class="custom-file-input" id="customFile">
					  <label class="custom-file-label" for="customFile">Logo</label>
					</div>
                </div>

                <div class="row">
                	<div class="col-sm-12">
                		<input type="input" name="" class="form-control" placeholder="Data tambahan (optional)">
                	</div>
                </div><br>
                <h4>Data Personil</h4>

                <div class="row">
                  <div class="form-group col-sm-5">
                  	<input type="input" name="" class="form-control" required="" placeholder="Nama">
                  </div>
                  	<div class="custom-file col-4">
					  <input type="file" class="custom-file-input" id="customFile">
					  <label class="custom-file-label" for="customFile">Insert Foto</label>
					</div>
				</div>

                <div class="row">
                  <div class="form-group col-sm-5">
                  	<input type="input" name="" class="form-control" required="" placeholder="Nick in Game">
                  </div>
                  <div class="custom-file col-4">
					  <input type="file" class="custom-file-input" id="customFile">
					  <label class="custom-file-label" for="customFile">Insert Additional</label>
					</div>
                </div>

                <div class="row">
                	<div class="col-sm-5">
                		<input type="input" name="" class="form-control" required="" placeholder="ID in Game">
                	</div>
                </div>
                <div align="center">
                	<button class="btn btn-outline-warning"><i class="fas fa-plus-square"></i></button>	
                </div>
                
                

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-warning">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>



@endsection