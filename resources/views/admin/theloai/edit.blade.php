@extends("admin.layout.index")
@section('content')
	            <div class="col-lg-3"></div>
            <div class="col-lg-9">
              <div class="card themmoi">
                <h3 class="text-center">Sửa thể loại</h3>
                <div class="card-body">
                      <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
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
                          <label for="theloai">Tên thể loại</label>
                          <input type="text" class="form-control" id="theloai" value="{{$theloai->tentheloai}}" name="tentheloai">
                        </div>                                   
                        <button type="submit" class="btn btn-primary float-lg-right">Sửa</button>
                      </form>
                </div>
              </div>
            </div>
@endsection
