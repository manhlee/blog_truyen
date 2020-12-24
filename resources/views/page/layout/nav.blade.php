<div class="col-lg-3 sapxep-tab">
		   <h3 class="tieude-sapxep-tab"><i class="fas fa-tasks"></i>
		    Sắp xếp</h3>
		   <p class="sapxep-tab-item"><i class="far fa-gem"></i>
		     <a href="">Truyện vip</a></p>
		   <p class="sapxep-tab-item"><i class="fas fa-upload"></i>
		    <a href="">Mới cập nhật</a></p>
		   <p class="sapxep-tab-item"><i class="fas fa-arrow-up"></i>
		     <a href=""> Mới Đăng</a></p>
		   <p class="sapxep-tab-item"><i class="fas fa-eye"></i>
		    <a href="">Xem nhiều nhất</a></p>
		   <p class="sapxep-tab-item"><i class="fas fa-star"></i>
		    <a href="">Truyện full</a></p>
            <hr>
		    <div class="toptruyenhay">
		    	<h3 class="text-center tieude-toptruyenhay">Tác giả</h3>
		    	<?php $i=1; ?>
		    	@foreach($data2['tacgia'] as $tg)
		    	<div class="toptruyenhay-item">
		    	   <div class="stt-item">{{$i}}</div>
		    	   <a href="timkiem?key={{convert_str_to_key($tg->ten)}}" class="toptruyenhay-tieude pt-2">{{$tg->ten}}</a>
		    	</div>
		    	<?php $i++; ?>
		    	@endforeach
		    </div>
		    <hr class="cach-theloai">
		    <div class="theloai">
	            <h3 class="text-center tieude-theloai">Thể loại</h3>
	            <div class="theloai-item">
	            	@foreach($data2['theloaitruyen'] as $tlt)
	               <p>
	               	<i class="fas fa-paperclip"></i>
	               	 <a href="theloai/{{$tlt->id}}/{{$tlt->tenkhongdau}}.html">{{$tlt->tentheloai}}</a>
	               </p>
	               @endforeach
	            </div>
		    </div> <!-- end thể loại -->
		</div> <!-- end col-3 cột phải -->
	</div> <!-- end row -->
	</div>
  </div> <!-- end top 2 -->