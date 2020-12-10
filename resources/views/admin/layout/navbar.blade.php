<div class="container-fluid">
        <div class="row">
              <div class="side-bar">
                <div class="side-bar-item">
                  <ul class="text-left">
                  <li><a href="admin/dashboard" class="btn btn-default"><i class="fas fa-home"></i>
                  Bảng điều khiển</a></li>

                  <li class="item-chuyenmuc"><a href="admin/theloai/danhsach" class="btn btn-default"><i class="far fa-folder-open"></i>
                  Chuyên mục</a>
                    <div class="danhsach2">
                   <ul>
                     <li style="border: 0"><a href="admin/theloai/danhsach">Thể loại</a></li>
                     <li style="border: 0"><a href="admin/theloaitruyen/danhsach">Thể loại truyện</a></li>
                   </ul>
                  </div>
                </li>

                  <li><a href="admin/tacgia/danhsach" class="btn btn-default"><i class="fas fa-user"></i>
                  Tác giả</a></li>

                  <li class="truyen"><a href="admin/truyen/danhsach" class="btn btn-default"><i class="fas fa-book"></i>
                  Truyện</a>
                  <div class="danhsach">
                   <ul>
                     <li style="border: 0"><a href="admin/truyen/danhsach">Danh sách truyện</a></li>
                     <li style="border: 0"><a href="admin/truyen/themmoi">Thêm mới truyện</a></li>
                   </ul>
                  </div>
                </li>
                @if(session('admin')['level']==2)
                  <li><a href="admin/taikhoan/danhsach" class="btn btn-default"><i class="fas fa-users"></i>
                  Thành Viên</a></li>
                  <li><a href="" class="btn btn-default"><i class="fas fa-cog"></i>
                  Cài đặt hệt thống</a></li> 
                  </ul>
                  @endif
                </div>
            </div>
      