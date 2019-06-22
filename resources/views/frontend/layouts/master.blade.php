<!DOCTYPE html>
<html>
<head>
	<title>
		
		@yield('title', 'Ecommerce Shop')
	</title>
	
	@include('frontend.partials.styles')

<meta name="csrf-token" content="{{ csrf_token() }}">
	
</head>
<body>

<div class="wrapper" style="min-height: 900px;">
	
	@include('frontend.partials.nav')

	@yield('content')

	

</div>

@include('frontend.partials.footer')


@include('frontend.partials.scripts')


@yield('scripts')

</body>
</html>