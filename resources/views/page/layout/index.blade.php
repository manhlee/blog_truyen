@include('page.layout.header')

<!-- endslide -->
  @yield('content')
   <!-- end col-9 cột trái -->
		@include('page.layout.nav')
		@include('page.layout.login')
		@include('page.layout.sign')
<!-- end footer -->
@include('page.layout.footer')
