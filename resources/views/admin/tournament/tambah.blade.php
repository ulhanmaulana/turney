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
              <li class="breadcrumb-item active">Tambah</li>
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
                
              <form action="{{url('admin/turnamen/simpan')}}" method="POST" enctype="multipart/form-data">
        				{{ csrf_field() }}
        				 
                <div class="row">
                  <div class="form-group col-md-6">
                  <input type="input" name="nama_turnamen" class="form-control" required="" placeholder="Nama Turnament">
                  </div>

                  <div class="form-group col-md-6">
                  File Gambar
                  <input type="file" name="file_gambar" required="">
                  </div>
                </div><br>
        				
                <h3>Deskripsi Turnament</h3>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="biaya_turnamen" class="form-control" required="" placeholder="Biaya Turnament">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="deskripsi" class="form-control" required="" placeholder="Deskripsi Singkat">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                      <select name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="UMUM">UMUM</option>
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="hadiah" class="form-control" required="" placeholder="Hadiah">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="maksimum_slot" class="form-control" required="" placeholder="Maksimum Slot">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="penyelenggara" class="form-control" required="" placeholder="Penyelenggara">
                  </div>  
                </div>

                <div class="row">
                    <div class="form-group col-md-6"><input type="text" name="tempat" class="form-control" required="" placeholder="Tempat" value=""></div>
                    <div class="form-group col-md-6"> <input type="datetime-local" name="waktu" class="form-control" required="" placeholder="waktu" value=""></div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                  <select name="sistem_turnamen" class="form-select form-control" required="">
                      <option selected>Sistem Turnament</option>
                      <option value="1" >One</option>
                      <option value="2" >Two</option>
                      <option value="3" >Three</option>
                    </select>
                  </div>  
                </div>

                
        				<h3>Peraturan</h3>

                <div class="form-group">
                <textarea class="form-control" name="peraturan" required="" placeholder="Input Peraturan" style="height: 200px"></textarea>
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
