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
                  <h2 class="card-title">Update Product Details</h2><hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 

                   @include('admin.partials.message-success') 

                  </p>
      
                  <form action="{{ route('admin.product.update', $products->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title"  id="" value="{{$products->title}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="" rows="2">
                        
                        {{$products->description}}
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="text" name="price" class="form-control" id="" value="{{$products->price}}">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword4">Quantity</label>
                      <input type="number" class="form-control" name="quantity" id="" value="{{$products->quantity}}" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Select Category</label>
                      <select class="form-control" name="category_id">
                        <option value="">Select a category</option>
                        @foreach( App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent )
                        <option value="{{ $parent->id }} " {{ $parent->id == $products->category->id ? 'selected' : '' }} style="font-size: 16px;"> {{ $parent->name }} </option>

                         @foreach( App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child )
                         <option value="{{ $child->id }} " {{ $child->id == $products->category->id ? 'selected' : '' }} class="ml-4" > -----> {{ $child->name }} </option>
                          @endforeach

                        @endforeach
                      </select>
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Select Brand</label>
                      <select class="form-control" name="brand_id">
                        <option value="">Select a Brand</option>
                        @foreach( App\Models\Brand::orderBy('name', 'asc')->get() as $br )
                        <option value="{{ $br->id }}" {{ $br->id == $products->brand->id ? 'selected' : '' }} > {{ $br->name }} </option>
                        @endforeach
                      </select>
                     
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Product Image</label>
                      <input type="file" class="form-control" name="product_image[]"  id="" >
                      <input type="file" class="form-control" name="product_image[]"  id="" >
                      <input type="file" class="form-control" name="product_image[]"  id="" >

                    </div>
                      <br>
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    
                  </form>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection