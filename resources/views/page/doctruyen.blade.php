@extends('page.layout.index')
@section('content')
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12 truyen">
  		     <div class="jumbotron jumbotron-fluid text-center">
  		     	<h1 class="tieude-truyen display-3">{{$truyen->tentruyen}}</h1>
  		     	<p class="tieude-chuong lead">{{$chuong->ten}}</p>
  		     	<p class="tieude-tacgia lead">Tác Giả: {{$truyen->tacgia->ten}}</p>
  		     </div>
  		    	@if(count($truyen->chuong)>1)
	  		      <div class="thaotac-truyen_duoi text-center">
	  		     	@foreach($truyen->chuong as $key=>$value)
					@if($value->id==$chuong->id && $key>0)
						<a class="btn btn-primary" href="doctruyen/{{$truyen->chuong[$key-1]->id}}/{{$truyen->tenkhongdau}}/{{$truyen->chuong[$key-1]->tenkhongdau}}.html">< Trước</a>
					@endif
					@endforeach
	  		     	<select class="danhsachchuong-truyen list_chapter1" >
	  		     		<option  hidden>{{$chuong->ten}}</option>
	  		     		@foreach($truyen->chuong as $ch)
	  		     		<option data-tenkhongdau="{{$ch->tenkhongdau}}" value="{{$ch->id}}">{{$ch->ten}}</option>
	  		     		@endforeach
	  		     	</select>
	  		     	@foreach($truyen->chuong as $key=>$value)
					@if($value->id==$chuong->id && $key<count($truyen->chuong)-1)
						<a class="btn btn-primary" href="doctruyen/{{$truyen->chuong[$key+1]->id}}/{{$truyen->tenkhongdau}}/{{$truyen->chuong[$key+1]->tenkhongdau}}.html">Sau ></a>
					@endif
					@endforeach
	  		     </div>
  		     	@endif
  		     <div class="noidungtruyen">
  		     	{!!$chuong->noidung!!}
  		     </div>
  		        <p class="wedtruyen text-center">Bạn đang đọc truyện trên: 
  		     	  <a href="trangchu">vanhoc.com.vn</a>
  		     	</p>
  		     	@if(count($truyen->chuong)>1)
	  		      <div class="thaotac-truyen_duoi text-center">
	  		     	@foreach($truyen->chuong as $key=>$value)
					@if($value->id==$chuong->id && $key>0)
						<a class="btn btn-primary" href="doctruyen/{{$truyen->chuong[$key-1]->id}}/{{$truyen->tenkhongdau}}/{{$truyen->chuong[$key-1]->tenkhongdau}}.html">< Trước</a>
					@endif
					@endforeach
	  		     	<select class="danhsachchuong-truyen list_chapter2" >
	  		     		<option  hidden>{{$chuong->ten}}</option>
	  		     		@foreach($truyen->chuong as $ch)
	  		     		<option data-tenkhongdau="{{$ch->tenkhongdau}}" value="{{$ch->id}}">{{$ch->ten}}</option>
	  		     		@endforeach
	  		     	</select>
	  		     	@foreach($truyen->chuong as $key=>$value)
					@if($value->id==$chuong->id && $key<count($truyen->chuong)-1)
						<a class="btn btn-primary" href="doctruyen/{{$truyen->chuong[$key+1]->id}}/{{$truyen->tenkhongdau}}/{{$truyen->chuong[$key+1]->tenkhongdau}}.html">Sau ></a>
					@endif
					@endforeach
	  		     </div>
  		     	@endif
      </div><!-- end nội dung -->

  </div>
</div>

@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('.list_chapter1').change(function(){
	
			var link='doctruyen/'+ $('.list_chapter1 option:selected').val()+"/{{$truyen->tenkhongdau}}/"+$('.list_chapter1 option:selected').data('tenkhongdau')+".html";
			window.location.href=link;
		});
		$('.list_chapter2').change(function(){
	
			var link='doctruyen/'+ $('.list_chapter2 option:selected').val()+"/{{$truyen->tenkhongdau}}/"+$('.list_chapter2 option:selected').data('tenkhongdau')+".html";
			window.location.href=link;
		});
	});
</script>
@endsection