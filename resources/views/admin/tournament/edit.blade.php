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

               
              <form action="{{url('admin/turnamen/update/')}}" method="POST" enctype="multipart/form-data">
        				{{ csrf_field() }}
                 
                <div class="row">
                  <div class="form-group col-md-6">
                   <input type="hidden" name="id_turnamen" class="form-control" required="required" placeholder="Nama Turnament" value="{{$data->id_turnamen}}">
                  <input type="input" name="nama_turnamen" class="form-control" required="required" placeholder="Nama Turnament" value="{{$data->nama_turnamen}}">
                  </div>

                  <div class="form-group col-md-6">
                  File Gambar
                  <input type="file" name="file_gambar" >
                  </div>
                </div><br>
                
                <h3>Deskripsi Turnament</h3>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="biaya_turnamen" class="form-control" required="required" placeholder="Biaya Turnament" value="{{$data->biaya_turnamen}}">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="deskripsi" class="form-control" required="" placeholder="Deskripsi Singkat" value="{{$data->deskripsi}}">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                 
                  <select name="kategori" id="kategori" class="form-control">
                        <option value="SMP"  @php if($data->kategori=='SMP') echo "selected"; @endphp>SMP</option>
                        <option value="SMA"  @php if($data->kategori=='SMA') echo "selected"; @endphp> SMA</option>
                        <option value="UMUM"  @php if($data->kategori=='UMUM') echo "selected"; @endphp>UMUM</option>
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="hadiah" class="form-control" required="" placeholder="Hadiah" value="{{$data->hadiah}}">
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="input" name="maksimum_slot" class="form-control" required="" placeholder="Maksimum Slot" value="{{$data->maksimum_slot}}">
                  </div>

                  <div class="form-group col-md-6">
                    <input type="input" name="penyelenggara" class="form-control" required="" placeholder="Penyelenggara" value="{{$data->penyelenggara}}"> 
                  </div>  
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6"><input type="text" name="tempat" class="form-control" required="" placeholder="Tempat" value="{{$data->tempat}}"></div>
                    <div class="form-group col-md-6"> <input type="datetime-local" name="waktu" class="form-control" required="" placeholder="waktu" value="{{date('Y-m-d\Th:m', strtotime($data->waktu))}}"></div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                  <select name="sistem_turnamen" class="form-select form-control" required="">
                      <option selected>Sistem Turnament</option>
                      <option value="1"  @php if($data->sistem_turnamen=='1') echo "selected"; @endphp>One</option>
                      <option value="2" @php if($data->sistem_turnamen=='2') echo "selected"; @endphp>Two</option>
                      <option value="3" @php if($data->sistem_turnamen=='3') echo "selected"; @endphp>Three</option>
                    </select>
                  </div>  
                </div>

                
                <h3>Peraturan</h3>

                <div class="form-group">
                <textarea class="form-control" name="peraturan" required="" placeholder="Input Peraturan" style="height: 200px" value="">{{$data->peraturan}}</textarea>
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