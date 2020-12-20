<div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      @if(count($errors)>0)
      	<div class="alert alert-danger">
      		@foreach($errors->all() as $err)
      			{{$err}}
      			<br>
      		@endforeach
      	</div>
      @endif
      <form action="{{route('dangky')}}" method="post">
      	<input type="hidden" name="_token" value="{{csrf_token()}}">
		  <div class="form-group">
		    <label for="email">Tên đăng nhập</label>
		    <input type="text" class="form-control" style="width: 420px !important;" placeholder="Nhập tên đăng nhập" name="username" id="email" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Email</label>
		    <input type="email" class="form-control" name="email" style="width: 420px !important;" placeholder="Nhập email" id="pwd" required>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Mật khẩu</label>
		    <input type="password" class="form-control" name="pass" style="width: 420px !important;" placeholder="Nhập mật khẩu" id="pwd" required>
		  </div>
		  <button type="submit" class="btn btn-primary">Đăng ký</button>
		</form>
        
      </div>
    </div>
  </div>
  @if(count($errors)>0)
  	@section('script')
  	 <script>
			jQuery(function(){
			   jQuery('#link_modan2').click();
			});
		</script>
  	@endsection
  @endif