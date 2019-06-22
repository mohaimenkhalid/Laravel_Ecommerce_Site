@extends('frontend.layouts.master')

@section('content')
	<div class="container margin-top-20">


		<div class=" card card-body">
			<h2>Confirm Item</h2>

			<hr>

			<div class="row">
					<div class="col-md-7 border-right">
						
						@foreach(App\Models\Cart::totalCarts() as $cart)

						<p> {{ $cart->product->title }} - <strong>{{ $cart->product->price }}</strong>
							- {{ $cart->product_quantity }} item
						 </p>
						@endforeach

						<p><a href="{{ route('carts') }}" class="btn btn-warning ">Change Chart Item</a></p>

					</div>

					<div class="col-md-5">

						@php
						$total_price = 0;
						@endphp

					@foreach(App\Models\Cart::totalCarts() as $cart)

						
						@php 		
							$total_price += $cart->product->price * $cart->product_quantity;
						@endphp

					@endforeach

						<p> Total Item - <strong>{{ App\Models\Cart::totalItems() }}</strong> </p>
						<p> Total Price - <strong>{{ $total_price }} Taka</strong></p>
						<p> Shipping Cost - <strong>{{ App\Models\Setting::first()->shipping_cost }} Taka</strong> </p>

						<p> Total Cost (Inc. Shipping cost) - <strong>{{ $total_price + App\Models\Setting::first()->shipping_cost }} Taka</strong></p>
						

					</div>

			</div>
			
		</div>


		<div class=" card card-body margin-top-10 ">
			
			<h2>Shipping Address</h2>
			<hr>

		@include('admin.partials.message') 

    @include('admin.partials.message-success') 
			<form action="{{ route('checkouts.store') }}" method="post" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciver Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name. ' '.Auth::user()->last_name : '' }}"  autofocus>
                                                         
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No.') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}"  autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
              

                          <div class="form-group row mb-4">
                            <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (required)') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address"   class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address"  rows="3" >
                                    
                                    {{ Auth::check() ? Auth::user()->shipping_address : '' }}
                                </textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-4">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message (optional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="message"   class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"  rows="3" >
                                    
                                   
                                </textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                         <div class="form-group row mb-4">
                            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('Payment (required)') }}</label>


                            <div class="col-md-6">
                               
                               <select class="form-control" name="payment_method_id"  id="payments">
                               	
                               	<option value="">Select a Payment Method</option>
                               	@foreach( $payments as $payment)
                               	<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                               	@endforeach
                               </select>


                               @foreach($payments as $payment)

                              		@if($payment->short_name == "Cash_in")
                              		 <div id="payment_{{$payment->short_name }}" class="hidden alert alert-success mt-4" >
                              		 		<h3>
                              		 			For Cash in Delivery there us nothing necessary. Just Click Finish or Order.
                              		 			<br>
                              		 			<small>
                              		 				You'll get product in 2-3 business days.
                              		 			</small>
                              		 		</h3>
                              		 	</div>

                              			@elseif($payment->short_name == "Nexuspay")
                              		 	 <div id="payment_{{$payment->short_name }}" class="hidden alert alert-danger mt-4" >
                              		 	 	
                              		 		<h3>DuchBangla Nexus Pay 
                              		 			<br>
                              		 			<small>
                              		 				This Payment Sytem is not available right now!! Try another payment system!
                              		 			</small>
                              		 		</h3>
                              		 		
                              		 	</div>
                              		 	@else 
                              		 	 <div id="payment_{{$payment->short_name }}" class="hidden alert alert-success mt-4" >
                              		 	 	
                              		 
                              		 		<h3> {{ $payment->name }} Payment</h3>

                              		 		<p>
                              		 			<strong>{{ $payment->name }} No: {{ $payment->no }}</strong>
                              		 			<br>
                              		 			<strong>Account Type:  {{ $payment->type }}</strong>
                              		 		</p>

                              		 		<div class="alert alert-success">
                              		 			Please send the avobe money to this {{ $payment->name }} Account Number and send your "Transection ID"
                              		 		</div>

                              		 	</div>
                              		 	@endif
                              	@endforeach

                                <input type="text" class="hidden" name="transaction_id" id="transaction_id" placeholder="Transection Id" >

                            </div>
                        </div>

                             <div class="form-group row mb-0">
                            	<div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-info mr-2">Order Now</button>
                    			</div>
                    		</div>


                    </form>
	
			
		</div>

	</div>

@endsection

@section('scripts')
		  <script type="text/javascript">
                  $("#payments").change(function(){

                  	$payment_method = $('#payments').val();
                  	
                  	if ($payment_method == "Cash_in") {

                  		$("#payment_Cash_in").removeClass('hidden');
                  		$("#payment_Nexuspay").addClass('hidden');
                  		$("#payment_Bkash").addClass('hidden');
                  		$("#payment_Roket").addClass('hidden');
                      $("#transaction_id").addClass('hidden');

                  	}else if($payment_method == "Nexuspay"){

                  		$("#payment_Nexuspay").removeClass('hidden');
                  		$("#payment_Cash_in").addClass('hidden');
                  		$("#payment_Bkash").addClass('hidden');
                  		$("#payment_Roket").addClass('hidden');
                      $("#transaction_id").addClass('hidden');

                  	}else if($payment_method == "Bkash"){
                  		$("#payment_Bkash").removeClass('hidden');
                  		$("#payment_Nexuspay").addClass('hidden');
                  		$("#payment_Cash_in").addClass('hidden');
                  		$("#payment_Roket").addClass('hidden');
                      $("#transaction_id").removeClass('hidden');

                  	}else if($payment_method == "Roket"){
                  		$("#payment_Roket").removeClass('hidden');
                  		$("#payment_Nexuspay").addClass('hidden');
                  		$("#payment_Bkash").addClass('hidden');
                  		$("#payment_Cash_in").addClass('hidden');
                      $("#transaction_id").removeClass('hidden');

                  	}
                   
                   })
          </script>
@endsection


