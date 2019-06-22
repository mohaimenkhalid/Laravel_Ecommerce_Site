@extends('admin.layouts.master')
@section('content')

 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-2"></div>
           <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <span class="card-title">Add Products</span><span style="float: right;"><a class="nav-link btn btn-primary" href="{{ route('admin.products') }}">Show Product List</a></span>
                  <hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 
                   @include('admin.partials.message-success') 


                  </p>
                  <form action="{{ route('admin.product.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title"  id="" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" name="price" class="form-control" id="" placeholder="Price">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword4">Quantity</label>
                      <input type="number" class="form-control" name="quantity" id="" placeholder="quantity">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Select Category</label>
                      <select class="form-control" name="category_id">
                        <option value="">Select a category</option>
                        @foreach( App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent )
                        <option value="{{ $parent->id }}" style="font-size: 16px;"> {{ $parent->name }} </option>

                         @foreach( App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child )
                         <option value="{{ $child->id }}" class="ml-4" > -----> {{ $child->name }} </option>
                          @endforeach

                        @endforeach
                      </select>
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Select Brand</label>
                      <select class="form-control" name="brand_id">
                        <option value="">Select a Brand</option>
                        @foreach( App\Models\Brand::orderBy('name', 'asc')->get() as $brand )
                        <option value="{{ $brand->id }}" > {{ $brand->name }} </option>
                        @endforeach
                      </select>
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Product Image</label>
                      <input type="file" class="form-control" name="product_image[]"  id="" placeholder="quantity">
                      <input type="file" class="form-control" name="product_image[]"  id="" placeholder="quantity">
                      <input type="file" class="form-control" name="product_image[]"  id="" placeholder="quantity">

                    </div>
          
                    <button type="submit" class="btn btn-success mr-2">Add Product</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection