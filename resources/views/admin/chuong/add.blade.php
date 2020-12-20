@extends("admin.layout.index")
@section('content')
       <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
              <div class="card themmoi">
                <h3 class="text-center">Thêm mới chương - {{$truyen->tentruyen}}</h3>
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
                      <form action="{{route('add_chapter')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id_truyen" value="{{$truyen->id}}">
                        <div class="form-group">
                          <label for="email">Tên chương</label>
                          <input type="text" class="form-control" id="" placeholder="Tên chương" name="tenchuong">
                        </div> 
                         <div class="form-group">
                          <label for="">Nội dung</label>
                          <textarea class="form-control ckeditor" id="ckeditor" placeholder="" name="noidung">
                          </textarea>
                        </div>  
                        <div class="form-group">
                          <label for="">Trạng thái</label>
                          <select name="trangthai" class="form-control">
                            <option value="2" >Hoàn thành</option>
                            <option value="1" selected>Chưa hoàn thành</option>
                        </select>
                        </div>                              
                        <button type="submit" class="btn btn-primary float-lg-right">Thêm</button>
                      </form>
                </div>
              </div>
            </div>
 @endsection
