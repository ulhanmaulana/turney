@extends('layouts.layoutadmin')


@section('content')
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">REGISTRATION</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Registration</li>
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
                  <th><a href="/admin/turnament/tambah" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> TAMBAH</a></th>
                </div>
              </div>
              <div class="card-body">
                
              <table id="table_turnamen" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Tim</th>
                    <th>Jumlah Anggota</th>
                    <th>Turnamen</th>
                    <th>Status Pendaftaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                <?php $no=1; ?>
                @foreach($data as $dt)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $dt->nama_tim }}</td>
                  <td>{{$dt->jml_anggota}}</td>
                  <td>{{ $dt->nama_turnamen }}</td>
                  <td>{{ $dt->status_pendaftaran }}</td>
                  
                  <td>
                              <!-- <a href="/admin/turnamen/edit/{{$dt->id_turnamen}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a> -->
                              <!-- <a href="" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a> -->
                              <!-- <a href="/admin/turnamen/delete/{{$dt->id_turnamen}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
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