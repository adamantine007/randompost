<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
	@include('partials.navigation')

	<div class="container main">
		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				@yield('content')
			</div>
		</div>
	</div>


	@include('partials.footer-scripts')

	@yield('footer')
</body>
</html>
