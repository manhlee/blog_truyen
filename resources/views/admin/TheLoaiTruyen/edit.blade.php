@extends("admin.layout.index")
@section('content')
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
              <div class="card themmoi">
                <h3 class="text-center">Thêm mới thể loại truyện</h3>
                <div class="card-body">
                  @if(count($errors))
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $err)
                        {{$err}}
                      @endforeach
                    </div>
                  @endif
                  @if(session('thongbao'))
                    <div class="alert alert-success">
                      {{session('thongbao')}}
                    </div>
                  @endif
                      <form action="admin/theloaitruyen/sua/{{$TheLoaiTruyen->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                        <label>Thể loại cha</label>
                        <select class="form-control" name="parent_category">
                           <option value="" @if($TheLoaiTruyen->theloaicha=='') {{'selected'}} @endif>Không có</option>
                          @foreach($TheLoai as $tl)
                          <option value="{{$tl->id}}" @if($TheLoaiTruyen->theloaicha==$tl->id) {{'selected'}} @endif>{{$tl->tentheloai}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="category-name">Tên thể loại truyện</label>
                          <input type="text" class="form-control" id="category-name" name="category_name" value="{{$TheLoaiTruyen->tentheloai}}">
                        </div>                                  
                        <button type="submit" class="btn btn-primary float-lg-right">Thêm</button>
                       
                      </form>
                </div>
              </div>
            </div>
@endsection
