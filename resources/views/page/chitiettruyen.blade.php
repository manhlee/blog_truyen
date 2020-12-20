@extends('page.layout.index')
@section('content')
  <div class="container">
  	<div class="row">
<div class="col-lg-9 truyen">
  			<div class="row">
  				<div class="col-lg-4 truyen-anhtrai">
  					<img src="upload/{{$truyen_chitiet->hinhanh}}" class="" alt="">
  				    <div class="anhtrai-info-truyen">
  				    	<i class="fas fa-user"></i>
  				    	<a href="">{{$truyen_chitiet->tacgia->ten}}</a>
  				    </div>
  				    <div class="anhtrai-info-truyen">
  				    	<i class="fas fa-folder-open"></i>
  				    	<a href="">{{$truyen_chitiet->theloaitruyen->tentheloai}}</a>
  				    </div>
  				    <div class="anhtrai-info-truyen">
  				       <p>Cập nhât: {{date_format($truyen_chitiet->created_at,"d/m/Y")}}</p>
  				    </div>
  				</div> <!-- end col-4 -->
  				<div class="col-lg-8 truyen-phai">
  					<h1 class="text-center">Truyện: {{$truyen_chitiet->tentruyen}}</h1>
  					<p class="lead text-center">Tác giả: {{$truyen_chitiet->tacgia->ten}}</p>
  					<div class="nut text-center">
  						<a href="#chuong" class="btn btn-primary"><i class="fas fa-bars"></i>
  						Danh sách chương</a>
  						<a href="" class="btn btn-danger"><i class="far fa-thumbs-up"></i>
  						Truyện yêu thích</a>
  					</div>
  					<hr>
  					<div class="nut text-center">
  						<a href="" class="btn btn-primary">Đọc Truyện</a>
  					</div>
  					<hr>
  					<div class="truyen-phai_info">
  						{{$truyen_chitiet->gioithieu}}
  					</div>
  					<div class="nut-xemthem text-center">
  					     <a href="" class="nut-rutgon_a" style="display: none;">Rút Gọn</a>
  					     <a href="" class="nut-xemthem_a">Xem Thêm</a>
  					</div>
  				</div> <!-- end col-8  -->
  			</div> <!-- edn row -->
  			<hr>
  			@if(count($truyen_chitiet->chuong)>1)
  		  <div class="danhsachchuong">
  		  	  <div class="danhsachchuong-tieude text-left">
  		  	  	<h3 id="chuong"><i class="fas fa-bars"></i>
  		  	  	Danh sách chương truyện <u>{{$truyen_chitiet->tentruyen}}</u></h3>
  		  	  </div>
  		  	  <hr>
  		  	  <div class="danhsachchuong-noidung">
  		  	  	@foreach($truyen_chitiet->chuong as $chuong)
  		  	  	<p class="danhsachchuong-noidung_item"><a href="">{{$chuong->ten}}</a></p>
  		  	  	  @endforeach
  		  	  </div>
  		  	
  		  </div><!-- end danh sách chương -->
  		  @endif
  		  <hr>
  		  <div class="binhluan">
  		  	<div class="binhluan-tieude text-left">
  		  		<h3><i class="fas fa-comments"></i>
  		  		Bình luận của độc giả</h3>
  		  	</div>
  		  	<hr>
  		  	<ul class="binhluan-list">
  		  		@foreach($truyen_chitiet->binhluan as $bl)
  		  	    <li class="binhluan clearfix">
  		  	    	<div class="user-info">
  		  	    		<a href="" class="user-info_ten">{{$bl->user->name}}</a>
  		  	    		 <span class="ngay">{{date_format($bl->created_at,"d/m/Y")}}</span>
  		  	    	</div>
  		  	    	<p class="mess">{{$bl->noidung}}</p>
  		  	    	<div class="binhluan-thaotac text-right">
  		  	    		<a href="" class="traloi">Trả lời</a>
                        <a href="" class="like"><i class="fas fa-thumbs-up"></i>
                        Thích</a>
  		  	    	</div>
  		  	    	<div class="traloi-click text-right d-none">
  		  	    		<textarea placeholder="trả lời bình luận" class="repcm"></textarea>
  		  	    		<button type="" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
  		  				 Gửi</button>
  		  	    	</div>
  		  	    </li>
  		  	    @endforeach
  		  	</ul>
  		  		<div class="binhluan-noidung">
  		  			@if(session('user'))
  		  		<form class="binhluan-form" method="post" action="{{route('comment')}}">
  		  			<input type="hidden" name="id_user" value="{{session('user')['id']}}">
  		  			<input type="hidden" name="id_truyen" value="{{$truyen_chitiet->id}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
  		  			<textarea name="comment" placeholder="Nội dung bình luận tối thiểu 15 ký tự, tối đa 500 ký tự!" required></textarea>
  		  			<div class="text-right">
  		  				<button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
  		  				 Gửi</button>
  		  			</div>
  		  		</form>
  		  		@else
  		  			<h3>Đăng nhập để bình luận!</h3>
  		  			<a type="button" href="dangnhap" class="btn btn-success">Đăng nhập</a>
  		  			<a type="button" href="dangky" class="btn btn-primary">Đăng ký</a>
  		  		@endif
  		  	</div>
  		  </div>
  		</div>
@endsection