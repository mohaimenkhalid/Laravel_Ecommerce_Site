
@extends('frontend.layouts.master')

@section('content')

		<!-- Sidebar + Content Start-->


		<div class=" margin-top-20 margin--left60">

			<div class="row">

		<div class="col-md-2 block">


			@include('frontend.partials.product-sidebar')

		</div>
		

	<div class="col-md-10 margin-left-40 margin-top ">

		<div class="col-md-10 ">
			@include('admin.partials.message') 

    		@include('admin.partials.message-success') 

    		</div>

				<!--Slider -->


					<div id="demo" class="carousel slide margin-left-10" data-ride="carousel">

					  <!-- Indicators -->
					  <ul class="carousel-indicators">
					    <li data-target="#demo" data-slide-to="0" class="active"></li>
					    <li data-target="#demo" data-slide-to="1"></li>
					  </ul>

					  <!-- The slideshow -->
					  <div class="carousel-inner">
					    <div class="carousel-item active  height-600">
					      <img src="{{ asset('images/s1.jpg') }}" height="600" alt="Los Angeles">
					    </div>
					    <div class="carousel-item height-600" >
					      <img src="{{ asset('images/s2.png') }}" height="600" alt="Chicago">
					    </div>

					  </div>

					  <!-- Left and right controls -->
					  <a class="carousel-control-prev" href="#demo" data-slide="prev">
					    <span class="carousel-control-prev-icon"></span>
					  </a>
					  <a class="carousel-control-next" href="#demo" data-slide="next">
					    <span class="carousel-control-next-icon"></span>
					  </a>

					</div>

				<!--Slider End-->






				<div class="widget margin-top-20">

					<h3 class="Featured-bg">Featured Products</h3>

				<div class="row ">

						@foreach($featured_products as $product)

						<div class="col-md-2">
							<div class="card" style="">

								@php  $i=1;  @endphp

						@foreach ($product->images as $image)
							@if($i>0)

							<img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image">

							@endif

							@php $i--; @endphp
						@endforeach

								  <div class="card-body">
								    <h4 class="card-title"> {{ $product->title }}</h4>
								    <p class="card-text">{{ $product->description }}</p>
								    @include('frontend.pages.product.partials.cart-button')
								  </div>
								</div>
						</div>

						@endforeach

				</div>




					</div>




				<div class="widget margin-top-20">

					<h3 class="Featured-bg">New Products</h3>
				<div class="row ">

						@foreach($new_products as $product)

						<div class="col-md-2">
							<div class="card" style="">

								@php  $i=1;  @endphp

						@foreach ($product->images as $image)
							@if($i>0)

							<img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image">

							@endif

							@php $i--; @endphp
						@endforeach

								  <div class="card-body">
								    <h4 class="card-title"> {{ $product->title }}</h4>
								    <p class="card-text">{{ $product->description }}</p>
								    @include('frontend.pages.product.partials.cart-button')
								  </div>
								</div>
						</div>

						@endforeach

				</div>




					</div>



				</div>

			</div>


			</div>

		</div>

		<!-- Sidebar + Content End-->

@endsection
