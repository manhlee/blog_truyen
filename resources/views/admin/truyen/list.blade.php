@extends('admin.layout.index')
@section('content')
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
             <div class="chuyenmuc">
               <div class="row">
                 <div class="col-lg-6">
                   <h3>Danh Sách Truyện</h3>
                 </div>
                <div class="col-lg-6 text-right">
                  <a href="admin/truyen/themmoi" class="btn btn-success"><i class="fas fa-plus"></i>
                  Thêm mới truyện</a>
                </div> 
               </div><!-- end header -->
               <hr>
               <div class="row">
                  <div class="col-lg-6">
                    @if(session('thongbao'))
                      <div class="alert alert-danger">
                        {{session('thongbao')}}
                      </div>
                    @endif
                   <div class="btn-group">
                     <button type="button" class="btn btn-default card">Hiển thị</button>
                     <button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-lg|btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu">
                      <a class="dropdown-item @if(Session('paginate')==2) {{'my-disable'}} @endif" href="admin/phantrang/truyen/2">2 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==4) {{'my-disable'}} @endif" href="admin/phantrang/truyen/4">4 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==6) {{'my-disable'}} @endif" href="admin/phantrang/truyen/6">6 dòng</a>
                        <a class="dropdown-item @if(Session('paginate')==8) {{'my-disable'}} @endif" href="admin/phantrang/truyen/8">8 dòng</a>
                     </div>
                   </div>                 
                 </div> 
                  <div class="col-lg-6 text-right">
                    <form>
                     <label><b>Tìm kiếm</b></label>
                      <input type="text" name="search" id="search" placeholder="Nhập từ khóa">
                    </form>
                </div> 
               </div> <!-- end row2 -->
              
 <div class="row"> 
  <div class="col-lg-12"> 
   <div class="card"> 
    <div class="card-body"> 
     <table class="table table-striped table-bordered table-list"> 
      <thead> 
       <tr> 
        <th class="text-center"><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs">Tên truyện</th> 
        <th>Chuyên mục</th> 
        <th>Tác giả</th> 
        <th>Người đăng</th> 
        <th>Số chương</th>
       </tr> 
      </thead> 
      <tbody>
        @foreach($truyen as $tr)
        <tr>
       <td align="center">
          <a class="btn btn-primary" href="admin/truyen/sua/{{$tr->id}}"><em class="fas fa-pencil-alt"></em></a>
          <a class="btn btn-danger" onclick="return confirm('Có thể bạn sẽ xóa toàn bộ chương thuộc truyện này!')" href="admin/truyen/xoa/{{$tr->id}}"><em class="fa fa-trash"></em></a>
          <a class="btn btn-success" href="admin/chuong/danhsach/{{$tr->id}}/{{$tr->tenkhongdau}}.html"><em class="fa fa-book"></em></a>
       </td> 
       <td class="hidden-xs"><b><i>{{$tr->tentruyen}}</i></b>
        @if($tr->trangthai==1)
          <span class="badge badge-danger">Chưa xong</span>
          @else
          <span class="badge badge-success">Đã xong</span>
          @endif
       </td> 
       <td>{{$tr->tentheloai}}</td> 
       <td>{{$tr->tentacgia}}</td>
       <td>{{$tr->name}}</td>
       <td>{{$tr->sochuong}}</td>
      </tr>
      @endforeach
     </tbody></table> 
    </div> 
    <div class="panel-footer card bg-light"> 
     <div class="row"> 
      <div class="col col-xs-4 text-left"><p id="count_page">Hiển thị {{$truyen->currentPage()}} của {{$truyen->lastPage()}}</p></div> 
      <div class="col col-xs-8 text-right pagin"> 
       {{$truyen->links()}}
       </ul>   
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
</div>
</div> <!-- end chuyenmuc -->
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    search_live();
    function search_live(query='')
  {
      $.ajax({
        url:"{{route('search_story')}}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('tbody').html(data.data_table);
          $('#count_page').html(data.count_page);
          $('.pagin').html(data.links);
        }
       })
      
  }
  $(document).on('keyup','#search',function(){
    if($('#search').val()=='')
      {
        location.reload();
      }else{
        search_live($('#search').val());
      }
    
  });
});
  
</script>
@endsection






























