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
                  <h2 class="card-title">Update Brand Details</h2><hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 

                   @include('admin.partials.message-success') 

                  </p>
      
                  <form action="{{ route('admin.brand.update',$brands->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                     
                      <label for="title">Brand Name</label>
                      <input type="text" class="form-control" name="name"  id="" value="{{$brands->name}} ">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" rows="4" name="description" id="" rows="2">
                        
                        {{$brands->description}}
                      </textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Brand Old Image</label><br>
                      <img src="{{ asset('images/brands/'.$brands->image) }}" width="100" ><br><br>
                      <label for="exampleInputPassword4">Brand Image</label>

                      <input type="file" class="form-control" name="image" id="image" >
                      

                    </div>
                      <br>
                    <button type="submit" class="btn btn-success mr-2">Update Brand</button>
                    
                  </form>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection