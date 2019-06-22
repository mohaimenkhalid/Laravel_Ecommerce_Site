@extends('frontend.layouts.master')

@section('content')

	<div class="container mt-2">
		
		<div class="row">
			<div class="col-md-4">
				<div class="list-group">
					<a href="" class="list-group-item">
						<img class="mb-1 img rounded-circle" src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}"  style="width: 100px;" > 
					</a>
					<a href="{{ route('user.dashboard')}}" class="list-group-item {{ Route::is('user.dashboard') ? 'active' : '' }}">
					 <i class="fas fa-chart-line"></i> Dashboard</a>
					<a href="{{ route('user.profile')}}" class="list-group-item {{ Route::is('user.profile') ? 'active' : '' }}">
						<i class="fas fa-user-edit"></i> Update Profile</a>
					<a href="" class="list-group-item "><i class="fas fa-sign-out-alt"></i> Logout</a>
				</div>
			</div>
				<div class="col-md-8">
					<div class="card card-body">
						@yield('sub-content')
					</div>
				</div>
		</div>
	</div>
@endsection