@extends('layouts.layoutpeserta')


@section('content')
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Profile</li>
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
               
              </div>
              <div class="card-body">
                <table>
                    <tr>
                        <td width="60%" valign="top">
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Nama Tim </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">{{$tim->nama_tim}}</div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Jumlah Anggota</h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">{{$tim->jml_anggota}}</div>
                            </div>
                            <hr>
                            @php $no=1; @endphp
                            @foreach($anggota as $data_anggota)
                            <div class="row col-md-12">
                            <h6>Anggota {{$no++}}</h6>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Nama  </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">{{$data_anggota->nama_peserta}}</div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Nick Name  </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">{{$data_anggota->nick_name}}</div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>ID in Game </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">{{$data_anggota->id_game}}</div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Foto </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7"><a href="">Lihat Foto</a></div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4"><h6>Additional  </h6></div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7"><a href="">Unduh data</a></div>
                            </div>
                            @endforeach
                           
                        </td>
                        <td>
                        <img src="{{asset('images/tim/'.$tim->logo_tim)}}" alt="" style="width:100%; height:400px">
                        </td>
                    </tr>
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
  

@endsection