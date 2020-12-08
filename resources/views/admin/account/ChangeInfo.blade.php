@extends("admin.layout.index")
@section('content')
@if(session('admin'))
	            <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
              <div class="card themmoi">
                <h3 class="text-center">Thay thông tin cá nhân</h3>
                <div class="card-body">
                    @if(session('thongbao'))
                     <div class="alert alert-danger">
                        {{session('thongbao')}}
                     </div>
                    @endif
                    @if(session('thanhcong'))
                    <div class="alert alert-success">
                         {{session('thanhcong')}}
                    </div>
                    @endif
                    @if(count($errors)>0)
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                            {{$err}}
                            <br>
                          @endforeach
                      </div>
                    @endif
                      <form action="{{route('change_infor_admin')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                          <label for="email">Username</label>
                          <input type="email" class="form-control"  placeholder="" name="" disabled value="{{session('admin')['name']}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control"  placeholder="" name="email"  value="{{session('admin')['email']}}">
                        </div>
                        <h2>Đổi mật khẩu</h2>
                         <div class="form-group">
                          <label for="email">Mật khẩu cũ</label>
                          <input type="text" class="form-control"  placeholder="" name="old_pass">
                        </div>  
                         <div class="form-group">
                          <label for="email">Mật khẩu mới</label>
                          <input type="password" class="form-control"  placeholder="" name="new_pass" >
                        </div>
                         <div class="form-group">
                          <label for="email">Nhập lại mật khẩu</label>
                          <input type="password" class="form-control"  placeholder="" name="pass_again" >
                        </div>                                    
                        <button type="submit" class="btn btn-primary float-lg-right">Thay đổi</button>
                      </form>
                </div>
              </div>
            </div>
@endif
@endsection
