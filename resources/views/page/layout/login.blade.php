<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
      <form action="{{route('dangnhap')}}" method="post">
      	<input type="hidden" name="_token" value="{{csrf_token()}}">
		  <div class="form-group">
		    <label for="email">Tên đăng nhập</label>
		    <input type="text" class="form-control" style="width: 420px !important;" placeholder="Nhập tên đăng nhập" name="username" id="email" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Mật khẩu</label>
		    <input type="password" class="form-control" name="pass" style="width: 420px !important;" placeholder="Nhập mật khẩu" id="pwd" required>
		  </div>
		 @if(session('thatbai'))
		 	<small style="color: red;">{{session('thatbai')}}</small>
		 @endif
		 @if(session('thanhcong'))
		 	<small style="color: green;">{{session('thanhcong')}}</small>
		 @endif
		  <button type="submit" class="btn btn-primary">Đăng nhập</button>
		</form>
        
      </div>
    </div>
  </div>
  @if(session('thatbai')||session('thanhcong'))
  	@section('script')
		<script>
			jQuery(function(){
			   jQuery('#link_modan1').click();
			});
		</script>
  	@endsection
  @endif  