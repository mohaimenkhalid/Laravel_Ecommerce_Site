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
                  <h2 class="card-title">Update Division Details</h2><hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 

                   @include('admin.partials.message-success') 

                  </p>
      
                  <form action="{{ route('admin.division.update',$divisions->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                     
                      <label for="title">Name</label>
                      <input type="text" class="form-control" name="name"  id="" value="{{ $divisions->name}}  ">
                    </div>

                    <div class="form-group">
                     
                      <label for="title">Priority</label>
                      <input type="text" class="form-control" name="priority"  id="" value="{{ $divisions->priority}}  ">
                    </div>

                      <br>
                    <button type="submit" class="btn btn-success mr-2">Update Division</button>
                    
                  </form>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection