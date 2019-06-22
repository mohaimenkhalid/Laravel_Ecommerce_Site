@extends('frontend.pages.users.master')

@section('sub-content')

	<div class="container mt-4">
		
		<h2>Welcome {{ $user->first_name." ".$user->last_name }}</h2>
		<p>You can change your profile and every information here..</p>

		<hr>

		<div class="row">
			<div class="col-md-4 ">
				<a class="list-group-item text-center mt-2 " href="{{ route('user.profile') }}">Update Profile</a>
			</div>

		</div>
	</div>
@endsection