@extends('frontend.layouts.master')

@section('content')
	<div class="container margin-top-20">

		<h2>My Cart Items</h2><br>

		@include('admin.partials.message-success') 

		@if (App\Models\Cart::totalItems() > 0)

				<table class="table table-bordered table-striped ">
				<thead >
					<tr>
						<th>No.</th>
						<th>Product Title</th>
						<th>Product Image</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Sub Total Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php 

					$total_price=0; 

					@endphp
					@foreach(App\Models\Cart::totalCarts() as $cart)

					<tr>
						<td> {{ $loop->index +1 }}</td>
						<td><a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }} </a></td>
						<td>
							@if ($cart->product->images->count() > 0)
							<a href="{{ route('products.show', $cart->product->slug) }}"><img width="70"  src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" alt="Cart image"></a>
							@endif
						</td>
						<td>
							
							<form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
								@csrf
								<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}" />
								<button type="submit" class="btn btn-info ml-1">Update</button>
							</form>
						</td>
						<td>{{ $cart->product->price }}</td>

						<td>
					@php 

					 $total_price += $cart->product->price* $cart->product_quantity;

					@endphp
							{{ $cart->product->price* $cart->product_quantity }}
						</td>
						<td>
							<form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
								@csrf
							<input type="hidden" name="id" value="{{ $cart->id }}" />
							<input type="submit" value="Delete" class="btn btn-danger" />
							</form>
						</td>
					</tr>

					@endforeach
				</tbody>
				
					<tr>
						<td colspan="4"></td>
						
						<td><strong>Total Amount:</strong></td>
						<td colspan="2"><strong>{{ $total_price }} Taka</strong></td>
					</tr>

		</table>

		<div class="float-right">
			<a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping...</a>
			<a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg">Checkout</a>
		</div>

		@else
		<div class="alert alert-warning">
			<strong>There is no item in your Cart</strong>
		</div>
		<a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping...</a>

		@endif

@endsection
	</div>
