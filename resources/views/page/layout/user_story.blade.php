<div class="modal" id="myModal3">
    <div class="modal-dialog modal_story">
      <div class="modal-content">
    <div class="container">
       <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Truyện đang đọc
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                    @foreach($truyen_daxem as $tr)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="upload/{{$tr->truyen->hinhanh}}" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-center col-sm-12  col-md-8">
                            <h4 class="product-name"><strong>{{$tr->truyen->tentruyen}}</strong></h4>
                            <h4>
                                <small>Tác giả: {{$tr->truyen->tacgia->ten}} </small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 text-center row">
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a href="truyen/{{$tr->truyen->id}}/{{$tr->truyen->tenkhongdau}}.html" class="btn btn-success">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <hr>
   
            </div>
        </div>
</div>
        
      </div>
    </div>
  </div>