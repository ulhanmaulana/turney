@extends('layouts.layoutadmin')


@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">TOURNAMENT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/berita">Tournament</a></li>
              <li class="breadcrumb-item active">Edit</li>
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

               
              <form action="" method="POST" enctype="multipart/form-data">
        				{{ csrf_field() }}
                 
                <div class="row">
                  <div class="form-group col-md-6">
                  <input type="input" name="" class="form-control" required="" placeholder="Nama Turnament">
                  </div>

                  <div class="form-group col-md-6">
                  File Gambar
                  <input type="file" name="file_gambar" required="">
                  </div>
                </div><br>
                
                <h3>Deskripsi Turnament</h3>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Biaya Turnament">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Deskripsi Singkat">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Kategori">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Hadiah">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Maksimum Slot">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Penyelenggara">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Waktu dan Tempat">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="" class="form-control" required="" placeholder="Penyelenggara">
                  </div>  
                </div>

                
                <h3>Peraturan</h3>

                <div class="form-group">
                <textarea class="form-control" name="" required="" placeholder="Input Peraturan" style="height: 200px"></textarea>
                </div>

                <div class="float-sm-right">
                  <input type="submit" value="Simpan" class="btn btn-primary">  
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
    <!-- /.content -->

@endsection