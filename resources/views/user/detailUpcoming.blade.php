@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')
<section id="" class="">
      <div class="container" data-aos="fade-up">

      	<div class="row row-cols-3 justify-cntent-center align-items-center mb-1">
      		<div class="col-lg-4 mx-auto">
				<img src="{{ asset('images/tournament/'.$turnamen->file_gambar) }}" class="rounded" height="300px" width="100%" style="margin-top:-60px" >
			</div>
		</div>
		<div align="center">
			<h1 style="color: orange">{{$turnamen->nama_turnamen}}</h1>          	
		</div

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
					  		<td>Biaya Pendaftaran : Rp. {{number_format($turnamen->biaya_turnamen,2)}}</td>
					  		<td>Slot : {{$turnamen->jml_peserta}} dari {{$turnamen->maksimum_slot}} </td>
					  	</tr>
					  	<tr>
					  		<td>Tempat : {{$turnamen->tempat}}</td>
					  		<td>Sistem Turnament : {{$turnamen->sistem_turnamen}}</td>
					  	</tr>
					  	<tr>
					  		<td colspan="2">Kategori : {{$turnamen->kategori}}</td>
					  	</tr>
					  	<tr style="border-top: solid 1px white" align="center">
					  		<td><h2>HADIAH <br>{{$turnamen->hadiah}}</h2></td>
					  			<td>
								  @if($turnamen->jml_peserta != $turnamen->maksimum_slot)
								  <a class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Daftar </a>
								  @endif
								</td>
					  	</tr>

				  	</table>
				  </div>

				  <div class="tab-pane fade" id="pills-peraturan" role="tabpanel" aria-labelledby="pills-peraturan-tab">
				  	<div class="tab-content" id="pills-tabContent">
				  	<div class="tab-pane fade show active" id="pills-deskripsi" role="tabpanel" aria-labelledby="pills-deskripsi-tab">
					  <table class="table table-borderless table-warning">
					  	<tr>
					  		<td>{{$turnamen->peraturan}}</td>
					  	</tr>
						  </table>
						  
					</div>
					</div>
				  	
				  </div>
				  <div class="tab-pane fade" id="pills-peserta" role="tabpanel" aria-labelledby="pills-peserta-tab">
				  <div class="tab-content" id="pills-tabContent">
				  	<div class="tab-pane fade show active" id="pills-deskripsi" role="tabpanel" aria-labelledby="pills-deskripsi-tab">
					  <table class="table table-borderless table-warning">
					  @php $no=1; @endphp
					 
					  	<tr align="center">
					  		<td>
							  <div class="row col-md-12">
							  @foreach($peserta as $data_peserta)
							  	<div class="col-md-4">
								  <img src="{{ asset('images/tim/'.$data_peserta->logo_tim) }}" class="rounded" height="100px" width="100px" >
									<br>
									{{$data_peserta->nama_tim}}  
									<br>
									<br>
								</div>
								@endforeach
							  </div>
							</td>
							<td></td>
					  	</tr>
						
					 </table>
						  
					</div>
					</div>
				 
				  </div>
				  <div class="tab-pane fade" id="pills-klasemen" role="tabpanel" aria-labelledby="pills-klasemen-tab">&nbsp;</div>
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
			  <form action="{{url('/pendaftaran')}}" method="POST" enctype="multipart/form-data">
			  {{ csrf_field() }}
		        <div class="row">
                  <div class="form-group col-sm-5">
				  <input type="hidden" name="id_turnamen" value="{{$turnamen->id_turnamen}}">
                  	<input type="input" name="nama_tim" class="form-control" required="" placeholder="Nama Tim">
                  </div>
                  <!-- <div class="form-group col-sm-7 ms-auto">
                  	Logo <input type="file" name="file_gambar" required="">
                  </div> -->
                  <div class="custom-file col-4">
				  	  <label class="" for="">Logo</label>
					  <input type="file" name="logo" class="" id="customFile">
					  
					</div>
                </div>

                <div class="row">
                	<div class="col-sm-5">
                		<input type="email" name="email" id="email" class="form-control" placeholder="Email" onkeyup="checkEmailExsist()">
						<small id="email-valid" hidden="true" style="color: red;">Email Sudah digunakan!</small>
                	</div>
                </div><br>
                <h4>Data Personil</h4>
				<table width="100%" class="table-common">
					<tr>
						<td>
						<div class="row">
						<div class="form-group col-sm-5">
							<input type="input" name="nama[0]" class="form-control" required="" placeholder="Nama">
						</div>
						<div class="custom-file col-4">
							<input type="file" name="foto[0]" class="" id="customFile" value="">
						</div>
						</div>
						</td>
					</tr>
					<tr>
						<td>
						<div class="row">
						<div class="form-group col-sm-5">
							<input type="input" name="nickname[0]" class="form-control" required="" placeholder="Nick in Game">
						</div>
						<div class="form-group col-sm-4">
							<input type="file" name="additional[0]" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">Additional</label>
							</div>
						</div>
						</td>
					</tr>
					<tr>
						<td>
						<div class="row">
							<div class="col-sm-5">
							<input type="input" name="idgame[0]" class="form-control" required="" placeholder="ID in Game">
							</div>
						</div>
						</td>
					</tr>
				</table>
               
                <div align="center">
                	<button onclick="tambah()" class="btn btn-outline-warning"><i class="fas fa-plus-square"></i></button>	
                </div>
                
              

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-warning" id="simpan" disabled="true" value="Submit">
		      </div>
		    </div>
		  </div>
		  </form>
		</div>


<script>

function checkEmailExsist(){
	//alert($('#email').val());
	
	$.ajax({
				url: "{{ url('checkemaileksist') }}",
				type: 'POST', //or POST
				data: {
					"_token": "{{ csrf_token() }}",
					email : $('#email').val()
				},
				success: function(data){
					
					console.log(data);
					if(data == "eksist"){
						$('#email-valid').removeAttr('hidden');
						$('#simpan').attr('disabled', 'true');
					}
					else{
						$('#email-valid').attr('hidden', 'true');
						$('#simpan').removeAttr('disabled');
					}
					
					
						// if (data.code == "200") {
						// 	sweetAlert({
						// 		title: 'success',
						// 		type: 'success',
						// 		text: data.message,
						// 		timer: 1500
						// 	})
						// 	document.getElementById('usergroup_id').value = data.id;
						// 	var roleArr = data.roleArr;
						// 	console.log(roleArr);
						// 	/* set id role */
						// 	for (var i = 0; i < roleArr.length; i++) {
						// 			var elem = roleArr[i];
						// 			document.getElementById('menu-' + elem.menu_id).value = elem.role_id;
						// 			console.log(document.getElementById('menu-' + elem.menu_id));
						// 	}
						// } else {
						// 	sweetAlert({
						// 		title: 'error',
						// 		type: 'error',
						// 		text: data.message,
						// 		timer: 1500
						// 	});
						// }
				}
		});
	
}
var i=0;
function tambah(){
	i=i+1;
	//window.alert(i);

  var out='<br><tr>'+
			'<td>'+
			'<div class="row">'+
			'<div class="form-group col-sm-5">'+
				'<input type="input" name="nama['+i+']" class="form-control" required="" placeholder="Nama">'+
			'</div>'+
			'<div class="custom-file col-4">'+
				'<input type="file" name="foto['+i+']" class="custom-file-input" id="customFile" value="no">'+
				'<label class="custom-file-label" for="customFile">Insert Foto</label>'+
			'</div>'+
			'</div>'+
			'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>'+
			'<div class="row">'+
			'<div class="form-group col-sm-5">'+
				'<input type="input" name="nickname['+i+']" class="form-control" required="" placeholder="Nick in Game">'+
			'</div>'+
			'<div class="custom-file col-4">'+
				'<input type="file" name="additional['+i+']" class="custom-file-input" id="customFile">'+
				'<label class="custom-file-label" for="customFile">Additional</label>'+
				'</div>'+
			'</div>'+
			'</td>'+
		'</tr>'+
		'<tr>'+
			'<td>'+
			'<div class="row">'+
				'<div class="col-sm-5">'+
					'<input type="input" name="idgame['+i+']" class="form-control" required="" placeholder="ID in Game">'+
				'</div>'+
			'</div>'+
			'</td>'+
		'</tr>';
$(".table-common").append(out).children(':last');
}
</script>

@endsection