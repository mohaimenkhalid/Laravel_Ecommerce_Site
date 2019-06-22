@extends('frontend.layouts.master')
@section('content')

		<!-- Sidebar + Content Start-->

		<div class=" margin-top-20 margin--left60">
			<div class="row">
				<div class="col-md-2 block">			
					@include('frontend.partials.product-sidebar')
				</div>
				<div class="col-md-10 margin-left-40 margin-top ">				
					<div class="widget margin-top-20">
						<h3 class="Featured-bg">You are Searching - <span class="badge badge-primary">{{ $search }}</span></h3>
						@include('frontend.pages.product.partials.allProducts')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<!-- Sidebar + Content End-->

@endsection