@extends('admin.layout.index')
@section('content')
                 <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
             <div class="chuyenmuc">
               <div class="row">
                 <div class="col-lg-6">
                   <h3>Quản lý tài khoản</h3>
                 </div>
                <div class="col-lg-6 text-right">
                  
                </div> 
               </div><!-- end header -->
               <hr>
               <div class="row">
                  <div class="col-lg-6">
                   <div class="btn-group">
                     <button type="button" class="btn btn-default card">Hiển thị</button>
                     <button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-lg|btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu">
                         <a class="dropdown-item @if(Session('paginate')==2) {{'my-disable'}} @endif" href="admin/phantrang/taikhoan/2">2 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==4) {{'my-disable'}} @endif" href="admin/phantrang/taikhoan/4">4 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==6) {{'my-disable'}} @endif" href="admin/phantrang/taikhoan/6">6 dòng</a>
                        <a class="dropdown-item @if(Session('paginate')==8) {{'my-disable'}} @endif" href="admin/phantrang/taikhoan/8">8 dòng</a>
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
    @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
    @endif
   <div class="card"> 
    <div class="card-body"> 
     <table class="table table-striped table-bordered table-list"> 
      <thead> 
       <tr> 
        <th class="text-center"><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs">ID</th> 
        <th>Username</th>
        <th>Email</th> 
        <th>Cấp độ</th> 
       </tr> 
      </thead> 
      <tbody>
        @foreach($users as $user)
        <tr> 
       <td align="center"><a class="btn btn-danger" href="admin/taikhoan/xoa/{{$user->id}}" onclick="return confirm('Bạn có thực sự muốn xóa người dùng này!')"><em class="fa fa-trash"></em></a>
       </td> 
       <td class="hidden-xs">{{$user->id}}</td> 
       <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       @if($user->level==1)
        <td>Người dùng</td>
        @elseif($user->level==2)
            <td>Supper user</td>
        @elseif($user->level==3)
            <td>Quản trị viên</td>
        @endif
      </tr> 
      @endforeach
     </tbody></table> 
    </div> 
    <div class="panel-footer card bg-light"> 
     <div class="row"> 
      <div class="col col-xs-4 text-left"><p id="count_page">Hiển thị {{$users->currentPage()}} của {{$users->lastPage()}}</p></div> 
      <div class="col col-xs-8 text-right pagin"> 
       {{$users->links()}}
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
        url:"{{route('search_user')}}",
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