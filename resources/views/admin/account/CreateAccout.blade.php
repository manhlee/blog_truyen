@extends("admin.layout.index")
@section('content')
@if(session('admin'))
              <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
              <div class="card themmoi">
                <h3 class="text-center">Tạo tài khoản </h3>
                <div class="card-body">
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
                      <form action="{{route('create_account_admin')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                          <label for="email">Username</label>
                          <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                          <div class="form-group">
                        <label>Loại tài khoản</label>
                        <select class="form-control" name="level">
                          <option value="2">Supper user</option>
                          <option value="3">Quản trị nội dung</option>
                        </select>
                        </div>
                         <div class="form-group">
                          <label for="email">Mật khẩu</label>
                          <input type="password" class="form-control" placeholder="" name="password" >
                        </div>
                         <div class="form-group">
                          <label for="email">Nhập lại mật khẩu</label>
                          <input type="password" class="form-control" placeholder="" name="pass_again" >
                        </div>                                    
                        <button type="submit" class="btn btn-primary float-lg-right">Tạo</button>
                      </form>
                </div>
              </div>
            </div>
@endif
@endsection
