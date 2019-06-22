
@extends('frontend.layouts.master')

@section('title')
{{ $product->title }} | Ecommerce Shop
@endsection

@section('content')

		<!-- Sidebar + Content Start-->

	<div class=" margin-top-20 margin--left60">
			
	<div class="row">
			
		<div class="col-md-2 block">		
			@include('frontend.partials.product-sidebar')
		</div>
		<div class="col-md-10 margin-left-40  ">			
				
			<div class="widget margin-top-15">
				<h3 class="Featured-bg">{{ $product->title }}</h3>
			</div>
			
    	<div class="row ml-3 mr-2">
			<div class="col-md-2">
				
				<!-- slider start -->
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

					  <div class="carousel-inner">
					  	@php $i=1; @endphp

					  	@foreach($product->images as $image)
					    <div class="carousel-item {{ $i==1 ? 'active':'' }}">
					      <img class="d-block w-100" src="{{ asset('images/products/'. $image->image) }}" alt="First slide">
					    </div>

					    @php $i++; @endphp

					    @endforeach

					    
					    
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
  					</a>

				</div>

				<!-- slider End-->

			</div>

			<div class="col-md-6 ml-5 mr-5">
				
					@include('admin.partials.message-success') 

					<h3>{{ $product->title }}</h3><span class="badge badge-info">{{  $product->quantity < 1 ? 'Sold Out' : $product->quantity.' Item is available' }}</span>
					
					<h3 style="color: #329f78;">৳ {{ $product->price }} </h3>
					<hr>
					<h5> Description: </h5>
					{{ $product->description }}
					
					<br>
					<hr>
					<br>
				<h5> Specifications of {{ $product->title }} </h5>	
				Brand : <span class="badge badge-info"> {{ $product->brand->name }}</span> <br>
				Category: <span class="badge badge-info">{{  $product->category->name  }}</span>
				<br><br>
				@include('frontend.pages.product.partials.cart-button')

			</div>

			<div class="col-md-2">
				<p>Delivery Options</p>
				<hr>

				<i class=" fa fa-check-square"></i> Home delivery <span style="float: right;">৳ 45</span><br><br>
				<i class="fa-check-square"></i> Cash on Delivery Available
				<br><br><br>

				<p>Return & Warranty</p>
				<hr>

				<i class="fa-check-square"></i>  100% Authentic <br><br>
				<i class="fa-check-square"></i>  14 days easy return



			</div>

		</div>

		</div>

	</div>

			</div>


			</div>

		</div>

		<!-- Sidebar + Content End-->

@endsection