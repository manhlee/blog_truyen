<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloai;
use Illuminate\Support\Facades\Session;

class TheloaiController extends Controller
{
    //phan construct nay sẽ để trong controller của page được load đầu tiên
    // để khởi tạo session phân trang luôn
      public function list_category()
    {
    	
    	$theloai=theloai::paginate(Session::get('paginate'));
    	return view('admin.theloai.list',['theloai'=>$theloai]);
    }
    public function load_add()
    {
    	return view('admin.theloai.add');
    }
    public function post_add(Request $req)
    {
    	$this->validate($req,
    	[
    		'tentheloai'=>'required|min:5|max:50|unique:theloai'
    	],
    	[
    		'tentheloai.required'=>"Bạn chưa nhập tên thể loại!",
    		'tentheloai.min'=>"Tên thể loại phải lớn hơn 5 ký tự !",
    		'tentheloai.max'=>"Tên thể loại phải nhỏ hơn 50 ký tự !",
    		'tentheloai.unique'=>"Tên thể loại đã tồn tại !"
    	]);
    	$theloai=new theloai;
    	$theloai->tentheloai=$req->tentheloai;
    	$theloai->tenkhongdau=convert_vi_to_en($req->tentheloai);
    	$theloai->save();
    	return redirect('admin/theloai/themmoi')->with('thongbao','Thêm mới thành công!');
    }
    public function load_edit($id)
    {
    	$theloai=theloai::find($id);
    	return view('admin/theloai/edit',['theloai'=>$theloai]);
    }
    public function post_edit(Request $req,$id)
    {
    	$this->validate($req,
    	[
    		'tentheloai'=>'required|min:5|max:50|unique:theloai'
    	],
    	[
    		'tentheloai.required'=>"Bạn chưa nhập tên thể loại!",
    		'tentheloai.min'=>"Tên thể loại phải lớn hơn 5 ký tự !",
    		'tentheloai.max'=>"Tên thể loại phải nhỏ hơn 50 ký tự !",
    		'tentheloai.unique'=>"Tên thể loại đã tồn tại !"
    	]);
    	 	$theloai=theloai::find($id);
    	 	$theloai->tentheloai=$req->tentheloai;
    	 	$theloai->tenkhongdau=convert_vi_to_en($req->tentheloai);
    	 	$theloai->save();
    	 	return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function delete_cate($id)
    {
    	theloai::destroy($id);
    	return redirect("admin/theloai/danhsach")->with('thongbao2','Xóa thành công!');

    }
    public function search_live(Request $req)
    {
    		$data='';
    		$links='';
    		$cout_page='';
    		
    		$query=$req->get('query');
    		if($query!='')
    		{
    			
    			$theloai= theloai::where('tentheloai','like','%'.$query.'%')->orderBy('id', 'desc')->get();
    			if($theloai->count()>0)
    			{
    				foreach ($theloai as $tl) {
    					$data.='<tr>
      							 	<td align="center"><a class="btn btn-primary" href="admin/theloai/sua/'.$tl->id.'"><em class="fas fa-pencil-alt"></em></a> <a href="admin/theloai/xoa/'.$tl->id.'" class="btn btn-danger" onclick="return confirm(\'Có thể bạn sẽ xóa toàn bộ truyện thuộc thể loại này ?\')"><em class="fa fa-trash"></em></a>
      								 </td> 
       								<td class="hidden-xs">'.$tl->id.'</td> 
       								<td>'.$tl->tentheloai.'</td> 
      							</tr>' ;
      							
    				}
    			$cout_page='Tìm thấy '.$theloai->count().' kết quả';
    		}else{
    			$data="<tr>
    				<td align='center' colspan='3'>Không tìm thấy!</td>
    			</tr>";
    		}
    			$data_output=array(
    			'data_table'=>$data,
    			'links'=>$links,
    			'count_page'=>$cout_page
    		);
    		echo json_encode($data_output);
    		}
    		/*chú ý 
				phần này lấy text từ thẻ input sau đó gửi về đây truy vấn rồi trả dữ liệu về
				vấn đề khi trong thẻ input trắng thì phải  load  lại trang cũ
				cách đơn giản là sử lý bên người dùng, kiểm tra hộp input nếu nó có dữ liệu
				thì mới sử dụng ajax gửi đi ngượi lại không có thì mình sẽ reload
    		*/
    }
}
