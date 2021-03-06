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

        @foreach (App\Berita::all() as $pel)
        <a href="detailberita" class="link-dark">
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
            <a href="#" class="btn-berita">SEE ALL NEWS</a>
          </div>
          
        </div>
      </div>
    </section>
    <!-- end of berita section -->


@endsection