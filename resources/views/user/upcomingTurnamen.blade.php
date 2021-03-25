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

        	<a href="#" class="link-dark">
				<div class="card" style="width: 18rem;" align="center">
				  <img src="{{ asset('upcoming/coba.jpg') }}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nama Turnament</h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Nama Game</li>
				    <li class="list-group-item">Kategori</li>
				    <li class="list-group-item">Tempat</li>
				  </ul>	  
				</div>
			</a>

			<a href="#" class="link-dark">
				<div class="card" style="width: 18rem;" align="center">
				  <img src="{{ asset('upcoming/coba.jpg') }}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nama Turnament</h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Nama Game</li>
				    <li class="list-group-item">Kategori</li>
				    <li class="list-group-item">Tempat</li>
				  </ul>	  
				</div>
			</a>

			<a href="#" class="link-dark">
				<div class="card" style="width: 18rem;" align="center">
				  <img src="{{ asset('upcoming/coba.jpg') }}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nama Turnament</h5>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Nama Game</li>
				    <li class="list-group-item">Kategori</li>
				    <li class="list-group-item">Tempat</li>
				  </ul>	  
				</div>
			</a>

		</div>

	</div>
</section>




@endsection