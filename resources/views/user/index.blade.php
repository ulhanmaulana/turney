@extends('layouts.app')


<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center mb-5">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
      
    </div>
    
  </section><!-- End Hero -->

@section('content')
	<!-- Berita section -->
    <section id="" class="berita">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>RECENT NEWS</h2>          
        </div>
        <!--  -->
        <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($berita as $pel)
        <a href="/detailberita/{{ $pel->id }}" class="link-dark">
          <div class="col">
            <div class="card h-100 border-warning">
              <img src="images/{{ $pel->gambar }}" class="card-img-top" alt="..." height="200px">
              <div class="card-body">
                <h5 class="card-title">{{ $pel->title }}</h5>
                <p class="card-text">{{ $pel->content }}</p>
              </div>
            </div>
          </div>
         </a>
         @endforeach
        

        </div>
        <!--  -->
        <div class="row mt-5" align="center">
          <div>
            <a href="/news" class="btn-berita">SEE ALL NEWS</a>
          </div>
          
        </div>
      </div>
    </section>
    <!-- end of berita section -->

    <!--section upcoming turnament  -->
    <section class="upcoming">
      <div class="container" data-aos="fade-up">

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

        <div class="row mt-5" align="center">
          <div>
            <a href="/turnament/upcoming" class="btn-upcoming">SEE ALL UPCOMING TOURNAMENT</a>
          </div>
        </div>

      </div>
    </section>
    <!--end of section upcoming turnament  -->    


@endsection