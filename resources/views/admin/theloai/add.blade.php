@extends("admin.layout.index")
@section('content')
	            <div class="col-lg-3"></div>
            <div class="col-lg-9">
              <div class="card themmoi">
                <h3 class="text-center">Thêm mới thể loại</h3>
                <div class="card-body">
                      <form action="admin/theloai/themmoi" method="POST">
                      	<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                        	@if(count($errors)>0)
                        	<div class="alert alert-danger">
                        		@foreach($errors->all() as $err)
                        			{{$err}}
                        			<br>
                        		@endforeach
                        	</div>
                        	@endif
                        	@if(session('thongbao'))
                        		<div class="alert alert-success">
                        			{{session('thongbao')}}
                        		</div>
                        	@endif
                          <label for="email">Tên thể loại</label>
                          <input type="text" class="form-control" id="" placeholder="Nhập tên thể loại" name="tentheloai">
                        </div>                                   
                        <button type="submit" class="btn btn-primary float-lg-right">Thêm</button>
                      </form>
                </div>
              </div>
            </div>
@endsection
