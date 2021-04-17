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
            @if($pendaftaran->status_pendaftaran == "on process")
              <form  action="{{url('/peserta/pembayaran')}}" method="POST" enctype="multipart/form-data">
        				{{ csrf_field() }}
                        <input type="hidden" name="id_pendaftaran" value="{{$pendaftaran->id_pendaftaran}}">
					    <input type="hidden" name="nominal" value="{{$pendaftaran->biaya_pendaftaran}}">
					    <input type="hidden" name="no_invoice" value="{{$pendaftaran->no_invoice}}">
        				<div class="form-group">
        				<b>Pilih Bank Asal</b>
                        <select name="bank_asal" id="" class="form-select form-control">
							<option value="">Pilih Bank Asal</option>
							<option value="BCA">BCA</option>
							<option value="BRI">BRI</option>
							<option value="MANDIRI">MANDIRI</option>
							<option value="LAINNYA">Lainnya</option>
						</select>
        				</div>

                        <div class="form-group">
        				<b>Bank Atas Nama</b>
                            <input type="text" name="atas_nama" class="form-control" placeholder="atas nama " >
        				</div>
                        <div class="form-group">
        				<b>Tanggal Bayar</b>
                            <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal bayar " >
        				</div>

                        <div class="form-group">
                        <b>Upload Bukti Pembayaran</b><br/>
                        <input type="file" class="form-control"  name="bukti_bayar"  >
                        </div>

        				<div class="float-sm-right">
                  <input type="submit" value="Simpan" class="btn btn-primary">  
                </div> 
        				
      			   </form>
                @else
                <div class="row col-md-12">
                    <div class="col-md-4"><h6>Bank Asal</h6></div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-7">{{$pendaftaran->bank_asal}}</div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4"><h6>Atas Nama</h6></div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-7">{{$pendaftaran->atas_nama_asal}}</div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4"><h6>Tanggal Bayar</h6></div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-7">{{date('d-m-Y',strtotime($pendaftaran->tgl_bayar))}}</div>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4"><h6>Bukti Pembayaran</h6></div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-7"></div>
                </div>
                <div class="row col-md-12">
                    <img src="{{asset('images/bukti_pembayaran/'.$pendaftaran->bukti_bayar)}}" alt="" style="width:100%; height:400px">
                </div>

                
                @endif

                
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
    <!-- /.content -->

@endsection
