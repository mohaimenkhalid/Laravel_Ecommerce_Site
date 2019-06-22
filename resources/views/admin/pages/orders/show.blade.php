@extends('admin.layouts.master')
@section('content')

 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-1"></div>
           <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">View Order #LE0{{ $order->id }}</h3><hr>

           @include('admin.partials.message-success') 
                  
                  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                        <h3 >Order Infomations</h3><br>
                  <div class="row ">
                    <div class="col-md-6 border-right ">
                      <p><strong>Customer Name :</strong> {{ $order->name }}</p>
                      <p><strong>Customer Phone :</strong> {{ $order->phone_no }}</p>
                      <p><strong>Customer Email :</strong> {{ $order->email }}</p>
                      <p><strong>Customer Shipping Address :</strong> {{ $order->shipping_address }}</p>

                    </div>

                    <div class="col-md-6">
                      <p><strong>Payment Method :</strong> {{ $order->payment->name }}</p>
                      <p><strong>Payment Transection ID :</strong> #{{ $order->transaction_id }}</p>
                      
                    </div>
                  </div>

                  <hr>

              <div class="row ml-2">

                 <div class="col-md-2 mr-2">Order Status</div>

                    <div class="col-md-1 mr-4">
                        <form action="" method="post">
                          @csrf

                          @if($order->is_seen_by_admin == 1)
                          <button class="btn btn-success"><i class="fas fa-check"></i> Seen</button>
                          @else
                          <button class="btn btn-warning"><i class="fas fa-times"></i> Unseen</button>
                          @endif
                        </form>                                   
                    </div>

                    <div class="col-md-1 mr-4">
                       <form action="{{ route('admin.orders.paid', $order->id) }}" method="post">
                          @csrf
                          @if($order->is_paid == 1)
                          <button class="btn btn-success"><i class="fas fa-check"></i> Paid</button>
                          @else
                          <button class="btn btn-warning"><i class="fas fa-times"></i> Unpaid</button>
                          @endif
                        </form>
                    </div>

                    <div class="col-md-1 mr-4">                      
                      <form action="{{ route('admin.orders.completed', $order->id) }}" method="post">
                          @csrf
                          <!-- this condition for before completed must be paid --> 
                         @if($order->is_completed == 1 && $order->is_paid == 1)
                          <button class="btn btn-success"><i class="fas fa-check"></i> Completed</button>
                          @else
                          <button class="btn btn-danger"><i class="fas fa-times"></i>Incomplete </button>
                          @endif
                        </form>

                    </div>
                  </div>

                  <hr>
                 
                    
                    <div class="card">
                
                        <div class="card-body">

                          @if($order->carts->count() > 0)
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
                                    @foreach($order->carts as $cart)

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
                                          <input type="number" name="product_quantity"  class="form-control" value="{{ $cart->product_quantity }}" />
                                          <button type="submit" class="btn btn-info ml-1 "><i class="fas fa-pencil-alt"></i>Update</button>
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
                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i>Delete</button>
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
                        @endif                     
              
                    </div>
          
                  </div>

                </div>

              </div>


            </div>

                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection