@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')
	<!-- Berita section -->
    <section id="" class="berita">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>ALL NEWS</h2>          
        </div>
        <!--  -->
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
        <!-- <div class="row mt-5" align="center">
          <div>
            <a href="#" class="btn-berita">SEE ALL NEWS</a>
          </div>
          
        </div> -->
      </div>
    </section>
    <!-- end of berita section -->


@endsection