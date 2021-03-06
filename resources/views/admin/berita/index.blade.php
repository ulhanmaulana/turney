@extends('admin.berita.appberita')


@section('content')
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">NEWS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">News</li>
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
            <div class="card">
              <div class="card-header border-1">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"></h3>
                  <th><a href="/admin/berita/tambah" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> TAMBAH</a></th>
                </div>
              </div>
              <div class="card-body">
                
                <table class="table table-hover table-striped">

                  <thead>
                    <tr>
                      <th>no</th>
                      <th>judul</th>
                      <th>berita</th>
                      <th>gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=0 ?>
                    @foreach (App\Berita::all() as $pel)
                    <?php $no++ ?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $pel->title }}</td>
                      <td>{{ $pel->content }}</td>
                      <td>{{ $pel->gambar }}</td>
                      <td>
                                  <a href="/Admin/order/edit/{{$pel->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                  <a href="/Admin/order/show/BAKBB/{{$pel->id}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a>
                                  <a href="/Admin/order/delete/{{$pel->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
  

@endsection