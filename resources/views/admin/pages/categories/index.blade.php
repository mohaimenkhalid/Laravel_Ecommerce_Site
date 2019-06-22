@extends('admin.layouts.master')
@section('content')

 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-1"></div>
           <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Category Product</h2><hr>

          @include('admin.partials.message-success') 
                  
                  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
          
                  <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                      <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Category Name</th>
                          <th>Parent Id</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)

                        <tr>
                          <td>
                            #
                          </td>
                          
                          <td>
                           {{ $category->name }}
                          </td>
                         <td>
                          @if ($category->parent_id == NULL)

                           <label class="badge badge-primary">Primary Category</label>
                          @else
                         <label class="badge badge-success">{{ $category->parent->name }}</label> 
                          @endif
                         </td>
                          <td>
                            {{ $category->description }}
                          </td>

                           <td >
                            <img  src="{{ asset('images/categories/'.$category->image ) }}" alt="image" />
                                          

                          </td>
                         
                          <td>
                            <a href="{{ route('admin.category.edit', $category->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i>Edit</a>
                            <a href="#deleteModal{{ $category->id }}" class="btn btn-danger" data-toggle="modal" ><i class="fas fa-trash-alt"></i>Delete </a>
                            <!--Delete Modal -->

                              <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warrning!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          Are You sure to Delete this Category? <br><br><b>Warrning!!</b> if you delete primary category, sub category also remove !!
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{ route('admin.category.delete',$category->id)}}" method="post">
                                            {{ csrf_field() }}
                                           <button type="submit" class="btn btn-danger">Yes</button>
                                          </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                          </td>
                        </tr>
                       
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

                  </p>
                 
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <!-- main-panel ends -->

      @endsection