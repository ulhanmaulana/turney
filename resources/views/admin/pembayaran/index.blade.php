@extends('layouts.layoutadmin')


@section('content')
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">PAYMENT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Payment</li>
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
                  
                </div>
              </div>
              <div class="card-body">
                
              <table id="table_turnamen" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Invoice</th>
                    <th>Nama Tim</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                <?php $no=1; ?>
                @foreach($data as $dt)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $dt->no_invoice }}</td>
                  <td>{{ $dt->nominal }}</td>
                  <td>{{ $dt->nama_tim }}</td>
                  
                  <td>{{$dt->status_pembayaran}}</td>
                 
                  
                  <td>
                  @if($dt->status_pembayaran=="Menunggu Konfirmasi")
                  <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalKonfirmasi-{{$dt->id_pembayaran}}"><i class="fa fa-edit"></i> Konfirmasi</a>
                     
                     <div class="modal fade" id="modalKonfirmasi-{{$dt->id_pembayaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <form action="{{url('/admin/pembayaran/konfirmasi')}}" method="POST" enctype="multipart/form-data">
			                {{ csrf_field() }}
                            <input type="hidden" name="id_tim" value="{{$dt->id_tim}}">
                            <input type="hidden" name="id_pembayaran" value="{{$dt->id_pembayaran}}">
                            <input type="hidden" name="id_pendaftaran" value="{{$dt->id_pendaftaran}}">
                           <div class="modal-body">
                             <div class="row">
                             <table width="100%" class="table table-borderless">
                             <tr >
                                <td width="30%">Bank Asal </td>
                                <td width="5%"> : </td>
                                <td width="">{{$dt->bank_asal}}</td>
                             </tr>
                             <tr>
                                <td width="30%">Atas nama </td>
                                <td width="5%"> : </td>
                                <td width="">{{$dt->atas_nama_asal}}</td>
                             </tr>
                             <tr>
                                <td width="30%">Nominal </td>
                                <td width="5%"> : </td>
                                <td width="">{{$dt->nominal}}</td>
                             </tr>
                             <tr>
                                <td width="30%">Tanggal Pembayaran </td>
                                <td width="5%"> : </td>
                                <td width="">{{date('d-m-Y',strtotime($dt->tgl_bayar))}}</td>
                             </tr>
                             </table>
                                <img src="{{asset('images/bukti_pembayaran/'.$dt->bukti_bayar)}}" style="width:100%;height:300px" alt="">
                             </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <input type="submit" class="btn btn-info" value="Konfirmasi">
                           </div>
                           </form>
                         </div>
                       </div>
                    </div>
                    @else
                    <a href="{{ asset('images/bukti_pembayaran/'.$dt->bukti_bayar) }}" target="_blank">Lihat Gambar</a>
                    @endif
                              
                              
                  </td>

                  
                </tr>
                @endforeach

                </tbody>  
                 </table>
                                

                
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
  
<script>

$('#table_turnamen').DataTable();


</script>	
@endsection