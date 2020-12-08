@extends("admin.layout.index")
@section('content')
     <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
              <div class="card themmoi">
                <h3 class="text-center">Thêm truyện mới</h3>
                <div class="card-body">
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
                  <form action="{{route('add_story')}}" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                          <label for="">Tên truyện</label>
                          <input type="text" class="form-control" id="" placeholder="" name="TenTruyen">
                        </div> 
                       
                         <fieldset class="form-group">
                         <label for="">Thể loại truyện</label>   
                          <select name="TheLoaiTruyen" class="form-control">
                             <option value="" hidden>Thể loại truyện</option>
                            @foreach($TheLoaiTruyen as $tlt)
                          <option value="{{$tlt->id}}">{{$tlt->tentheloai}}</option>
                          @endforeach
                        </select>
                        </fieldset>

                        <fieldset class="form-group">
                          <label for="">Tên tác giả</label>
                          <select name="TacGia" class="form-control">
                             <option value="" hidden>Tên tác giả</option>
                            @foreach($TacGia as $tg)
                          <option value="{{$tg->id}}">{{$tg->ten}}</option>
                          @endforeach
                        </select>
                        </fieldset>
                        <div class="form-group">
                          <label for="">Giới thiệu</label>
                          <textarea class="form-control noidungtruyen" name="GioiThieu"></textarea>
                        </div>
                           <div class="form-group">
                          <label for="">Ảnh tiêu đề truyện</label>
                          <input type="file" class="form-control" id="" name="file" placeholder="">
                        </div>
                       <div class="form-group">
                         <input type="submit" class="btn btn-outline-success form-control" value="Thêm">
                       </div>
                      </form>
                </div>
              </div>
            </div> 
 @endsection
