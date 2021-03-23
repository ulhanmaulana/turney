@extends('layouts.app')

<section id="hora" class="d-flex justify-cntent-center align-items-center ">
    <!--  -->
    
  </section><!-- End Hero -->

@section('content')


	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      			<div class="d-flex">
		      				<div class="w-100">
		      					<h3 class="mb-4" style="color: orange">Sign In</h3>
					      	</div>
						</div>

						<form action="#" class="login-form">
				      		<div class="form-group">
				      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
				      			<input type="text" class="form-control rounded-left" placeholder="Username" required>
				      		</div>
			            	<div class="form-group">
			            		<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
			              		<input type="password" class="form-control rounded-left" placeholder="Password" required>
			            	</div>

			            	<div class="form-group d-flex justify-content-end">								
				            	<button type="submit" class="btn btn-login">Login</button>
			            	</div>
			          	</form>
	        		</div>
				</div>
			</div>
		</div>
	</section>
@endsection