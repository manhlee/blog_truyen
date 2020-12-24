@extends('page.layout.index')
@section('content')
@if(count($truyen)>0)
<div class="top2">
  	<div class="container">
  	<div class="row">
<div class="col-lg-9 list-truyen">
			<h3 class="text-center text-uppercase"><i class="fab fa-hotjar"></i>Thể loại: {{$theloaitruyen->tentheloai}}</h3>
			<div class="row">
				@foreach($truyen as $t)
				<div class="col-lg-4">
					<hr class="cach-item-truyen">
					<div class="item-truyen" style="opacity: 1; top: 0px;">
						<a href="#link"><img src="upload/{{$t->hinhanh}}" class="anh"></a>
						<a href="truyen/{{$t->id}}/{{$t->tenkhongdau}}.html"><div class="nenxam"></div></a>
						<div class="thanh1"></div>
						<div class="thanh2"></div>
						<div class="tieude">Tác phẩm: {{$t->tentruyen}}</div>
						<div class="tacgia">Tác giả: {{$t->tacgia->ten}}</div>
						<div class="tacgia luotxem"><i class="fas fa-eye"></i> {{$t->luotxem}} lượt xem</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@else
		<div class="top2">
  	<div class="container">
  	<div class="row">
<div class="col-lg-9 list-truyen">
			<h3 class="text-center text-uppercase"><i class="fab fa-hotjar"></i>Hiện chưa có tác phẩm nào !!</h3>
			
		</div>
		@endif
		@include('page.layout.nav')
@endsection