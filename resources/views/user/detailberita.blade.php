@extends('layouts.app')
<section id="hora" class="d-flex justify-cntent-center align-items-center mb-5">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')
<section class="mt-5 pt-5">
	<div class="container" data-aos="fade-up">
		<div class="section-title">
        	<h2>{{$berita->title}}</h2>          
        </div>
		
		<div class="row row-cols-3 justify-cntent-center align-items-center mb-5  ">
			<div class="col-lg-4"></div>
			<div class="col-lg-4 ">
				<img src="{{ asset('images/'. $berita->gambar) }}" class="rounded" height="200vh" width="100%" >
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row row-cols-3" align="">
			<div class="col-lg-2"></div>
			<div class="col-lg-8" >
				{{$berita->content}}	
			</div>
			<div class="col-lg-2"></div>
		</div>
		
	</div>
</section>
@endsection