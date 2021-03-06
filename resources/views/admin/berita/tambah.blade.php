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
              <li class="breadcrumb-item"><a href="/admin/berita">News</a></li>
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
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"></h3>
                  <!-- <th><a href="/admin/berita/tambah" type="button" class="btn btn-primary">TAMBAH</a></th> -->
                </div>
              </div>
              <div class="card-body">
                
              <form action="/admin/berita/simpan" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				 
				<div class="form-group">
				<b>File Gambar</b><br/>
				<input type="file" name="file_gambar">
				</div>
				 
				<div class="form-group">
				<b>Judul Berita</b>
				<input type="input" name="judul_berita" class="form-control">
				</div>

				<div class="form-group">
				<b>Isi Berita</b>
				<textarea class="form-control" name="isi_berita"></textarea>
				</div>
				 
				<input type="submit" value="Save" class="btn btn-primary">
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