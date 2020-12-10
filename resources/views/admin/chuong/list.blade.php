@extends('admin.layout.index')
@section('content')
            <div class="col-lg-3"></div>
            <div class="col-lg-9" id="noidung">
             <div class="chuyenmuc">
               <div class="row">
                 <div class="col-lg-6">
                   <h3>{{$truyen->tentruyen}}</h3>
                 </div>
                <div class="col-lg-6 text-right">
                  <a href="admin/chuong/themmoi/{{$truyen->id}}" class="btn btn-success"><i class="fas fa-plus"></i>
                  Thêm mới chương</a>
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
                      <a class="dropdown-item @if(Session('paginate')==2) {{'my-disable'}} @endif" href="admin/phantrangchuong/2">2 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==4) {{'my-disable'}} @endif" href="admin/phantrangchuong/4">4 dòng</a>
                       <a class="dropdown-item @if(Session('paginate')==6) {{'my-disable'}} @endif" href="admin/phantrangchuong/6">6 dòng</a>
                        <a class="dropdown-item @if(Session('paginate')==8) {{'my-disable'}} @endif" href="admin/phantrangchuong/8">8 dòng</a>
                     </div>
                   </div>                 
                 </div>
                  <div class="col-lg-6 text-right">
                     <form>
                     <label><b>Tìm kiếm</b></label>
                      <input type="text" name="search" id="search" placeholder="Tên chương">
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
        <th class="text-center" colspan="1"><em class="fa fa-cog"></em>
        </th> 
        <th class="hidden-xs" colspan="1">Tên Chương</th>
        <th class="hidden-xs text-center">Nội dung</th>
       </tr> 
      </thead> 
      <tbody>
        @foreach($chuong as $chap)
       <tr> 
       <td align="center"><a class="btn btn-primary" href="admin/chuong/sua/{{$chap->id}}"><em class="fas fa-pencil-alt"></em></a> <a class="btn btn-danger" href="admin/chuong/xoa/{{$chap->id}}" onclick="return confirm('Bạn có thực sự muốn xóa!')"><em class="fa fa-trash"></em></a>  
       </td> 
       <td class="hidden-xs">{{$chap->ten}}</td> 
       <td>{!!$chap->noidung!!}</td> 
        </tr> 
       @endforeach
     
     </tbody></table> 
    </div> 
    <div class="panel-footer card bg-light"> 
     <div class="row"> 
      <div class="col col-xs-4 text-left"><p id="count_page">Hiển thị {{$chuong->currentPage()}} của {{$chuong->lastPage()}}</p></div> 
      <div class="col col-xs-8 text-right pagin"> 
       {{$chuong->links()}}  
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
        url:"{{route('search_chapter')}}",
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






























