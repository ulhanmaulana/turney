@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')

<section class="upcoming">
	<div class="container">

		<div class="section-title">
          <h2>UPCOMING</h2>          
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4" align="center">
		@foreach($data as $dt)
		<a href="/turnament/upcoming/detail/{{$dt->id_turnamen}}" class="link-dark">
				<div class="card" style="width: 18rem;" align="center">
				  <img src="{{ asset('images/tournament/'.$dt->file_gambar) }}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">{{$dt->nama_turnamen}}</h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Nama Game</li>
				    <li class="list-group-item">{{$dt->kategori}}</li>
				    <li class="list-group-item">{{$dt->tempat}}</li>
				  </ul>	  
				</div>
			</a>

		@endforeach
        	

		</div>

	</div>
</section>




@endsection