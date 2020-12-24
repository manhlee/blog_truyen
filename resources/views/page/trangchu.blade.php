@extends('page.layout.index')
@section('content')
<!-- end header -->
@include('page.layout.slide')
<div class="top2">
  	<div class="container">
  	<div class="row">
		<div class="col-lg-9 list-truyen">
			<h3 class="text-center text-uppercase"><i class="fab fa-hotjar"></i> Truyện Hot</h3>
			<div class="row">
				@foreach($top_truyen as $tt)
				<div class="col-lg-4">
					<hr class="cach-item-truyen">
					<div class="item-truyen">
						<a href="#link"><img src="upload/{{$tt->hinhanh}}" class="anh"></a>
						<a href="truyen/{{$tt->id}}/{{$tt->tenkhongdau}}.html"><div class="nenxam"></div></a>
						<div class="thanh1"></div>
						<div class="thanh2"></div>
						<div class="tieude">Tác phẩm: {{$tt->tentruyen}}</div>
						<div class="tacgia">Tác giả: {{$tt->tacgia->ten}}</div>
						<div class="tacgia luotxem"><i class="fas fa-eye"></i> {{$tt->luotxem}} lượt xem</div>
					</div>
				</div>
				@endforeach
			</div>
			<hr>
			<h3 class="text-center text-uppercase">Truyện Mới</h3>
			<div class="row">
				@foreach($truyen_moi as $tm)
				<div class="col-lg-4">
					<hr class="cach-item-truyen">
					<div class="item-truyen">
						<a href="#link"><img src="upload/{{$tm->hinhanh}}" class="anh"></a>
						<a href="truyen/{{$tm->id}}/{{$tm->tenkhongdau}}.html"><div class="nenxam"></div></a>
						<div class="thanh1"></div>
						<div class="thanh2"></div>
						<div class="tieude">Tác phẩm: {{$tm->tentruyen}}</div>
						<div class="tacgia">Tác giả: {{$tm->tacgia->ten}}</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@include('page.layout.nav')
@endsection