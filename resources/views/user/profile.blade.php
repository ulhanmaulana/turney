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
				<img src="{{ asset('images/tim/'.$tim->logo_tim) }}" height="150vh" width="150vh" style="border-radius: 50%">				
			</div>
			<div class="mb-5">
				<h1>{{$tim->nama_tim}}</h1>
			</div>
			<div class="mb-2">
				<h3>Data Anggota</h3>
			</div>
			<div class="mb-5">
				<table class="" align="center" border="0" cellpadding="10">
					<tr>
					<td>
					<br><br>
					Nama : <br>
					Nick name : <br>
					Id in Game : <br>
					</td>
					@php $no=1; @endphp
					@foreach($anggota as $dt)
					<td>
						<b>Anggota {{$no++}}</b> <br><br>
						{{$dt->nama_peserta}} <br>
						{{$dt->nick_name}} <br>
						{{$dt->id_game}}
					</td>
					@endforeach
					</tr>
					
				</table>
				
				
			</div>
			@if($pendaftaran->id_pembayaran==null)
			<div class="mb-2">
				<h4>Upload Bukti Pembayaran</h4>
			</div>
			<div>
			<form action="{{url('/pembayaran')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row col-md-12">
				<div class="row col-md-2">&nbsp;</div>
				<div class="row col-md-10">
					<div class="row col-md-12">
					<div class="form-group col-sm-6">
					<input type="hidden" name="id_pendaftaran" value="{{$pendaftaran->id_pendaftaran}}">
					<input type="hidden" name="nominal" value="{{$pendaftaran->biaya_pendaftaran}}">
					<input type="hidden" name="no_invoice" value="{{$pendaftaran->no_invoice}}">
						<select name="bank_asal" id="" class="form-select form-control">
							<option value="">Pilih Bank Asal</option>
							<option value="BCA">BCA</option>
							<option value="BRI">BRI</option>
							<option value="MANDIRI">MANDIRI</option>
							<option value="LAINNYA">Lainnya</option>
						</select>
					</div>
					<div class="form-group col-sm-6">
						<input type="text" name="atas_nama" class="form-control" placeholder="atas nama " >
					</div>
					<div>
					<div class="row ">
						<div class="form-group col-sm-6">
						<input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal bayar " >
						</div>
						<div class="form-group col-sm-6">
							<input type="file" class="form-control"  name="bukti_bayar"  >
						</div>
					<div>
					<div class="row ">
						<div class="form-group col-sm-12" align="center">
							<input type="submit"class="btn btn-warning" value="Simpan">
						</div>
					<div>
				</div>
			</div>
			</form>
			
				
			</div>
			@else
			<div class="mb-2">
				<h4>Status Pendafataran : <span style="color:red">{{$pendaftaran->status_pendaftaran}}</span></h4>
				<h4>Bukti Pembayaran</h4>
				<img src="{{asset('images/bukti_pembayaran/'.$pendaftaran->bukti_bayar)}}" alt="" width="50%" height="500px">
			</div>

			@endif
			
			
			</div>
		</div>
	</div>	
</section>

	
@endsection