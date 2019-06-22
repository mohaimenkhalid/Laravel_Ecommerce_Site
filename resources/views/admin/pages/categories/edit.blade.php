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
                  <h2 class="card-title">Update Category Details</h2><hr>
                  <p class="card-description">
                  
                   @include('admin.partials.message') 

                   @include('admin.partials.message-success') 

                  </p>
      
                  <form action="{{ route('admin.category.update',$categories->id) }}" class="forms-sample" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                     
                      <label for="title">Name</label>
                      <input type="text" class="form-control" name="name"  id="" value="{{$categories->name}}  ">
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Parent</label>
                                        

                    <select class="form-control" name="parent_id" id="exampleFormControlSelect2">

                      <option value="">Primary Category</option>

                      @foreach($main_categories as $main_category)
                      

                      <option value="{{ $main_category->id }}"

                        <?php if ($categories->parent_id == $main_category->id): ?>
                          <?php echo 'selected'; ?>
                        <?php endif ?>
                        >{{ $main_category->name }}</option>
                      @endforeach
                     
                    </select>
                                        


                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" rows="4" name="description" id="" rows="2">
                        
                        {{$categories->description}}
                      </textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Category Old Image</label><br>
                      <img src="{{ asset('images/categories/'.$categories->image) }}" width="100" ><br>
                      <label for="exampleInputPassword4">Category Image</label>

                      <input type="file" class="form-control" name="image" id="image" >
                      

                    </div>
                      <br>
                    <button type="submit" class="btn btn-success mr-2">Update Category</button>
                    
                  </form>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection