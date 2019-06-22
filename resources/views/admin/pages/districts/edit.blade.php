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
      
                  <form action="{{ route('admin.district.update',$districts->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                     
                      <label for="title">District Name</label>
                      <input type="text" class="form-control" name="name"  id="" value="{{ $districts->name}}  ">
                    </div>

                   <div class="form-group">
                      <label for="division">Division Name</label>
                      <select name="division_id" class="form-control">
                        @foreach( App\Models\Division::orderBy('priority', 'desc')->get() as $division)
                          <option class="form-control" value="{{ $division->id }}"
                            <?php if($division->id == $districts->division_id){
                            echo "selected"; 
                          } ?>
                          
                           >{{ $division->name }}</option>
                          @endforeach
                      </select>
                    </div>

                      <br>
                    <button type="submit" class="btn btn-success mr-2">Update Districts</button>
                    
                  </form>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection