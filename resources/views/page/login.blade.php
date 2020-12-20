@include('page.layout.header')
<div class="container">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<form action="/action_page.php">
		  <div class="form-group">
		    <label for="email">Tên đăng nhập</label>
		    <input type="email" class="form-control" placeholder="Enter email" id="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Mật khẩu</label>
		    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
		  </div>
		  <small>Thông tin đăng nhập sai</small>
		  <div class="form-group form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="checkbox"> Remember me
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">Đăng nhập</button>
		</form>
	</div>
	<div class="col-lg-4"></div>
</div>
@include('page.layout.footer')