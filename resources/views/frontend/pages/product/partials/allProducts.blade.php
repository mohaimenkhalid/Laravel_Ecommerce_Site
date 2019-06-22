
			<div class="row ">
					
			@foreach ($products as $product)

				<div class="col-md-2" style="min-height: 450px">
					<div class="card" style="background-color: #f9f9f9">
							
					@php  $i=1;  @endphp
					
						@foreach ($product->images as $image)
						
							@if($i>0)

						<a href="{{ route('products.show', $product->slug) }}"><img style="height: 250px; width:100%" class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image">
						</a>

							@endif

							@php $i--; @endphp

						@endforeach

								<div class="card-body">
								    	<h4 class="card-title">
								    		<a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
								    	</h4>
								   		 <p class="card-text">Take - {{ $product->price }}/-</p>
								   		 @include('frontend.pages.product.partials.cart-button')
								</div>
						</div>

				</div>

		@endforeach

			</div>
<br>
			<div class="pagination mt-2">
				{{ $products->links() }}

			</div>				
