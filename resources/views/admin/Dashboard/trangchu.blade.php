@extends('admin.layout.index')
@section('content')
  <div class="col-lg-3"></div>
            <div class="col-lg-9 card thongtin-thongke" id="noidung">
               <div class="row">
                    <div class="col-lg-6">
                <div class="text-center">
                  <div class="header-thongtinthongke bg-light">
                    <h3>Thông tin</h3>
                  </div>
                  @if(session('admin'))
                  <table class="table table-striped table-bordered table-list">
                    <tr>
                      <th>Tên</th>
                      <td>{{session('admin')['name']}}</td>
                    </tr>
                    <tr>
                      <th>Chức vụ</th>
                      @if(session('admin')['level']==2)
                      <td>Supper Admin</td>
                      @endif
                      @if(session('admin')['level']==3)
                      	 <td>Quản trị nội dung</td>
                      @endif
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{session('admin')['email']}}</td>
                    </tr>
                    <tr>
                      <td><a href="admin/taikhoan/thaydoithongtin">Thay đổi thông tin</a></td>
                      @if(session('admin')['level']==2)
                      	 <td><a href="admin/taikhoan/taotaikhoan">Tạo tài khoản admin</a></td>
                      @endif
                    </tr>
                  </table>
                  @endif
                </div>
              </div> <!-- end cột thông tin -->
              <div class="col-lg-6">
                  <div class="text-center">
                  <div class="header-thongtinthongke bg-light">
                    <h3>Thống kê</h3>
                  </div>
                  <table class="table table-striped table-bordered table-list">
                    <tr>
                      <th>Tổng số truyện</th>
                      <td>{{$count_story}}</td>
                    </tr>
                    <tr>
                      <th><a href="admin/truyen/danhsach">Danh sách truyện</a></th>
                      <td></td>
                    </tr>
                  </table>
                </div>
                
                <div class="header-thongtinthongke bg-light">
                    <h3 class="text-center">Top truyện hot</h3>
                </div>
                <div class="card">
                  <ul class="">
                    @foreach($top_truyen as $tt)
                    <li><a href="admin/truyen/sua/{{$tt->id}}">{{$tt->tentruyen}}({{$tt->luotxem}} lượt xem)</a></li>
                    @endforeach
                  </ul>
                </div>

              </div><!-- end cột thống kê -->
               </div>
            </div>
@endsection