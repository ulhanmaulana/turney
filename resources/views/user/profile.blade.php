@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->


@section('content')
<section>
	<div class="container">
		<div class="card" style="text-align: center;" >
			<div class="row py-5">
			<div class="col-lg-12 mb-1" style="">
				<img src="{{ asset('tim/evos.jpg') }}" height="150vh" width="150vh" style="border-radius: 50%">				
			</div>
			<div class="mb-5">
				<h1>Nama Tim</h1>
			</div>
			<div class="mb-2">
				<h3>Data Anggota</h3>
			</div>
			<div class="mb-5">
				<table class="" align="center" border="0" cellpadding="10">
					<tr>
						<th>Anggota 1</th>
						<th>Anggota 2</th>
						<th>Anggota 3</th>
						<th>Anggota 4</th>
						<th>Anggota 5</th>
					</tr>
					<tr>
					    <td>id in game</td>
					    <td>id in game</td>
					    <td>id in game</td>
					    <td>id in game</td>
					    <td>id in game</td>
					</tr>
				</table>
				
				
			</div>
			<div class="mb-2">
				<h4>Upload Bukti Bayar</h4>
			</div>
			<div>
				<input type="file" name="">
			</div>
			</div>
		</div>
	</div>	
</section>

	
@endsection