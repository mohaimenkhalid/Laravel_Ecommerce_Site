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
                   <div class="card">
                <div class="card-body">
                  <span class="card-title">Add Division</span><span style="float: right;"><a class="nav-link btn btn-primary" href="{{ route('admin.categories') }}">Show Division List</a></span>
                  <hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 
                   @include('admin.partials.message-success') 


                  </p>
                  <form action="{{ route('admin.division.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="division">Division Name</label>
                      <input type="text" class="form-control" name="division"  id="" placeholder="Enter Division Name">
                    </div>

                    <div class="form-group">
                      <label for="division"> Priority </label>
                      <input type="text" class="form-control" name="priority"  id="" placeholder="Enter priority">
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