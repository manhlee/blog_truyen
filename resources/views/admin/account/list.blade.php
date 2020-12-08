@extends('admin.layout.index')
@section('content')
      <div class="col-lg-3"></div>
            <div class="col-lg-9">
             <div class="chuyenmuc">
               <div class="row">
                 <div class="col-lg-6">
                   <h3>Quản lý thể loại</h3>
                 </div>
                <div class="col-lg-6 text-right">
                  <a href="admin/theloai/themmoi" class="btn btn-success"><i class="fas fa-plus"></i>
                  Thêm mới</a>
                </div> 
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-6">
                   <div class="btn-group">
                     <button type="button" class="btn btn-default card">Hiển thị</button>
                     <button type="button" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-lg|btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu">

                       <a class="dropdown-item @if(Session('paginate')==2) {{'my-disable'}} @endif" href="admin/phantrang/theloai/2">2 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==4) {{'my-disable'}} @endif" href="admin/phantrang/theloai/4">4 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==6) {{'my-disable'}} @endif" href="admin/phantrang/theloai/6">6 dòng</a>
                        <a class="dropdown-item @if(Session('paginate')==8) {{'my-disable'}} @endif" href="admin/phantrang/theloai/8">8 dòng</a>
                     </div>
                   </div>                 
                 </div> 
                  <div class="col-lg-6 text-right">
                
                     <label><b>Tìm kiếm</b></label>
                      <input type="text" name="search" id="search" placeholder="Tên thể loại">
              
               
                </div> 
               </div> <!-- end row2 -->
              
 <div class="row"> 
  <div class="col-lg-12"> 
   <div class="card"> 
    <div class="card-body"> 
      @if(session('thongbao2'))
      <div class="alert alert-success">
        {{session('thongbao2')}}
      </div>
      @endif
     <table class="table table-striped table-bordered table-list"> 
      <thead> 
       <tr> 
        <th class="text-center"><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs">ID</th> 
        <th>TÊN THỂ LOẠI</th> 
       </tr> 
      </thead> 
      <tbody> 
     
    @foreach($theloai as $tl)
     <tr>
       <td align="center"><a class="btn btn-primary" href="admin/theloai/sua/{{$tl->id}}"><em class="fas fa-pencil-alt"></em></a> <a href="admin/theloai/xoa/{{$tl->id}}" class="btn btn-danger" onclick="return confirm('Có thể bạn sẽ xóa toàn bộ truyện thuộc thể loại này ?')"><em class="fa fa-trash"></em></a>
       </td> 
       <td class="hidden-xs">{{$tl->id}}</td> 
       <td>{{$tl->tentheloai}}</td> 
      </tr> 
    
      @endforeach
     </tbody></table> 
    </div> 
    <div class="panel-footer card bg-light"> 
     <div class="row"> 
      <div class="col col-xs-4 text-left"><p id="count_page">Hiển thị {{$theloai->currentPage()}} của {{$theloai->lastPage()}}</p></div> 
      <div class="col col-xs-8 text-right pagin"> 
        {{$theloai->links()}}
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    search_live();
    function search_live(query='')
  {
      $.ajax({
        url:"{{route('search_cate')}}",
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