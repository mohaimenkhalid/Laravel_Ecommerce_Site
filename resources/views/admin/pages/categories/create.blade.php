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
                  <span class="card-title">Add Category</span><span style="float: right;"><a class="nav-link btn btn-primary" href="{{ route('admin.categories') }}">Show Category List</a></span>
                  <hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 
                   @include('admin.partials.message-success') 


                  </p>
                  <form action="{{ route('admin.category.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Category Name</label>
                      <input type="text" class="form-control" name="name"  id="" placeholder="Enter Category Name">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Parent Category (Optional)</label>
                    <select class="form-control" name="parent_id" id="exampleFormControlSelect2">
                      <option value="">Primary Category</option>
                      @foreach($main_categories as $main_category)
                      <option  value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                      @endforeach
                      }
                    </select>
                  </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="" rows="4"></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword4">Category Image</label>
                      <input type="file" class="form-control"  name="image" accept="image/*" onchange="loadFile(event)" >
                      <img  width="150" id="output"/>
                    </div>



          
                    <button type="submit" class="btn btn-success mr-2">Add Category</button>
                   
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