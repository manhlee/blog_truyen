@include('page.layout.header')

<!-- endslide -->
  @yield('content')
   <!-- end col-9 cột trái -->
		
		@include('page.layout.login')
		@include('page.layout.sign')
		@if(Session::has('user'))
			@include('page.layout.user_story')
		@endif
<!-- end footer -->
@include('page.layout.footer')
