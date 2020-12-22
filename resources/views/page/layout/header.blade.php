<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('public/fontawesome.1-web/css/all.min.css')}}">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('public/public_page/css/truyen.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

	<title>Blog-truyện</title>
	 <base href="{{asset('')}}">
</head>
<body>
	<div class="menu-1">
	<nav class="navbar navbar-expand-lg container">
	  <img src="public/public_page/img/bg2.png" class="anh_bg">	
	
	    <form class="form-inline" action="timkiem" method="get">

	      <input class="form-control" name="key" type="search" placeholder="tìm kiếm truyện" aria-label="Search">
	      <button class="btn btn-outline" type="submit"><i class="fas fa-search"></i>
	      Tìm kiếm truyện</button>
	    </form>
	 
	</nav>
	</div>
	<div class="menu-2">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link active" href="trangchu">Trang chủ</a>
		  </li>
		  <li class="nav-item theloai">
		    <a class="nav-link" href="#">Thể loại</a>
		    <div class="theloai_thongbao thu">
		    	
		    				<ul class="text-center">
		    					 @foreach($data['theloai'] as $tl)
					    		<li>
					    			<a href="" class="theloai_thongbao_item">{{$tl->tentheloai}}</a>
					    		</li>
					    		@endforeach
		    				</ul>
		
		    </div> <!-- end thể loại -->
		  </li>
		  @foreach($data['theloai'] as $tl)
		  <li class="nav-item theloai">
		    <a class="nav-link" href="#">{{$tl->tentheloai}}</a>
		    @if(count($tl->theloaitruyen)>0)
		    @foreach($tl->theloaitruyen as $tlt)
		    <div class="theloai_thongbao thu">
		    	
		    				<ul class="text-center">
		    					 @foreach($tl->theloaitruyen as $tlt)
					    		<li>
					    			<a href="" class="theloai_thongbao_item">{{$tlt->tentheloai}}</a>
					    		</li>
					    		@endforeach
		    				</ul>
		    			</div>
		    	 
		    @endforeach
		    @endif
		  </li>
		  @endforeach
		  @if(session('user'))
		   <li class="nav-item theloai">
		    <a class="nav-link" href="#"><i class="fas fa-user"></i>
		    {{session('user')['name']}}</a>
		    <div class="theloai_thongbao thu">
		    	
		    				<ul class="text-center">
					    		<li>
					    			<a href="dangxuat">Đăng xuất</a>
					    		</li>
		    				</ul>
		    			</div>
		    	
		  </li>
		  @else
		   <li class="nav-item theloai">
		    <a class="nav-link" href="#"><i class="fas fa-user"></i>
		    Thành Viên</a>
		    <div class="theloai_thongbao thu">
		    
		    				<ul class="text-center">
					    		<li>
					    			<a data-toggle="modal" id="link_modan1" data-target="#myModal">Đăng nhập</a>
					    		</li>
					    		<li>
					    			<a data-toggle="modal" id="link_modan2" data-target="#myModal2">Đăng ký</a>
					    		</li>
		    				</ul>
		    	
		    </div> 
		  </li>
		 @endif
		</ul>
	</div>
  <hr>
  