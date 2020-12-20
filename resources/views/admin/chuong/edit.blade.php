@extends("admin.layout.index")
@section('content')
	                 <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
              <div class="card themmoi">
                <h3 class="text-center">Sửa chương</h3>
                <div class="card-body">
                  @if(count($errors))
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
                      <form action="admin/chuong/sua/{{$chuong->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                          <label for="email">Tên chương</label>
                          <input type="text" class="form-control" id="" placeholder="Tên chương" name="tenchuong" value="{{$chuong->ten}}">
                        </div> 
                         <div class="form-group">
                          <label for="">Nội dung</label>
                          <textarea class="form-control ckeditor" id="ckeditor" placeholder="" name="noidung">{!!$chuong->noidung!!}
                          </textarea>
                        </div> 
                         <div class="form-group">
                          <label for="">Trạng thái</label>
                          <select name="trangthai" class="form-control">
                            <option value="2" @if($chuong->truyen->trangthai==2) {{'selected'}} @endif >Hoàn thành</option>
                            <option value="1" @if($chuong->truyen->trangthai==1) {{'selected'}} @endif>Chưa hoàn thành</option>
                        </select>
                        </div>                                
                        <button type="submit" class="btn btn-primary float-lg-right">Sửa</button>
                      </form>
                </div>
              </div>
            </div>
@endsection
