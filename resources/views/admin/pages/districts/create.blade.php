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
                  <span class="card-title">Add District</span><span style="float: right;"><a class="nav-link btn btn-primary" href="{{ route('admin.categories') }}">Show District List</a></span>
                  <hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 
                   @include('admin.partials.message-success') 


                  </p>
                  <form action="{{ route('admin.district.store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="district">District Name</label>
                      <input type="text" class="form-control" name="name"  id="" placeholder="Enter District Name">
                    </div>

                     <div class="form-group">
                      <label for="division">Division Name</label>
                      <select name="division_id" class="form-control">
                        @foreach( $divisions as $division)
                          <option class="form-control" value="{{ $division->id }}" >{{ $division->name }}</option>
                          @endforeach
                      </select>
                    </div>


                  
          
                    <button type="submit" class="btn btn-success mr-2">Add District</button>
                   
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