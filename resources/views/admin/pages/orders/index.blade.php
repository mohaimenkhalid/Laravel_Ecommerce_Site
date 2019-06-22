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
                  <h2 class="card-title">Manage Orders</h2><hr>

          @include('admin.partials.message-success') 
                  
                  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
          
                  <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                      <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Order ID</th>
                          <th>Order Name</th>
                          <th>Order phone No</th>
                          <th>Order status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)

                        <tr>
                          <td>
                            {{ $loop->index + 1 }}
                          </td>

                          <td>
                           #LE0{{ $order->id }}
                          </td>
                          
                          <td>
                           {{ $order->name }}
                          </td>

                          <td>
                            {{ $order->phone_no }}
                          </td>

                           <td>
                            <p>
                              @if($order->is_seen_by_admin)
                          <label class="badge badge-success">Seen</label>
                          @else
                          <label class="badge badge-warning">Unseen</label>
                          @endif
                            </p>

                            <p>
                              @if($order->is_paid)
                          <label class="badge badge-success">Paid</label>
                          @else
                          <label class="badge badge-warning">UnPaid</label>
                          @endif
                            </p>

                            <p>
                              @if($order->is_completed && $order->is_paid)
                          <label class="badge badge-success">Compelete</label>
                          @else
                          <label class="badge badge-warning">Incomplete</label>
                          @endif
                            </p>
                          </td>

                          <td>
                            <a href="{{ route('admin.orders.view', $order->id)}}" class="btn btn-info"><i class="fas fa-eye"></i>View Order</a>
                            <a href="#deleteModal{{ $order->id }}" class="btn btn-danger" data-toggle="modal" ><i class="fas fa-trash-alt"></i>Delete </a>
                            <!--Delete Modal -->

                              <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warrning!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          Are You sure to Delete this order? <br><br><b>Warrning!!</b> if you delete primary order, sub order also remove !!
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{ route('admin.orders.delete',$order->id)}}" method="post">
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