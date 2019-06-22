@extends('admin.layouts.master')
@section('content')

 <!-- upload image preview Script --> 

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-2"></div>
           <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <div class="card">
                <div class="card-body">
                  <span class="card-title">Add Brand</span><span style="float: right;"><a class="nav-link btn btn-primary" href="{{ route('admin.brands') }}">Show brand List</a></span>
                  <hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 
                   @include('admin.partials.message-success') 


                  </p>
                  <form action="{{ route('admin.brand.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">brand Name</label>
                      <input type="text" class="form-control" name="name"  id="" placeholder="Enter brand Name">
                    </div>


                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="" rows="4"></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword4">brand Image</label>
                      <input type="file" class="form-control"  name="image" accept="image/*" onchange="loadFile(event)" >
                      <img  width="150" id="output"/>
                    </div>
          
                    <button type="submit" class="btn btn-success mr-2">Add brand</button>
                   
                  </form>
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