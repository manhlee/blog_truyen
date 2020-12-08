<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theloaitruyen;
use App\Models\theloai;
use Illuminate\Support\Facades\Session;

class TheLoaiTruyenController extends Controller
{
    //
    public function list_category_story()
    {
    	$TheLoaiTruyen=theloaitruyen::paginate(Session::get('paginate'));
    	return view('admin.TheLoaiTruyen.list',['TheLoaiTruyen'=>$TheLoaiTruyen]);
    }
    public function load_add()
    {
    	$theloai=theloai::all();
    	return view('admin.TheLoaiTruyen.add',['theloai'=>$theloai]);
    }
    public function post_add(Request $req)
    {
    	$this->validate($req,
    	[
    		'category_name'=>'required|min:5|max:50|unique:theloaitruyen,tentheloai'
    	],
    	[
    		'category_name.required'=>"Bạn chưa nhập tên thể loại!",
    		'category_name.min'=>"Tên thể loại phải lớn hơn 5 ký tự !",
    		'category_name.max'=>"Tên thể loại phải nhỏ hơn 50 ký tự !",
    		'category_name.unique'=>"Tên thể loại đã tồn tại !"
    	]);
    	$theloaitruyen=new theloaitruyen();
    	$theloaitruyen->tentheloai=$req->category_name;
    	$theloaitruyen->tenkhongdau=convert_vi_to_en($req->category_name);
    	$theloaitruyen->theloaicha=$req->parent_category;
    	$theloaitruyen->save();
    	return redirect('admin/theloaitruyen/themmoi')->with('thongbao','Thêm mới thành công!');
    }
    public function load_edit($id)
    {
    	$TheLoaiTruyen=theloaitruyen::find($id);
    	$TheLoai=theloai::all();
    	return view('admin.TheLoaiTruyen.edit',['TheLoaiTruyen'=>$TheLoaiTruyen,'TheLoai'=>$TheLoai]);
    }
    public function post_edit($id,Request $req)
    {
    	$this->validate($req,
    	[
    		'category_name'=>'required|min:5|max:50'
    	],
    	[
    		'category_name.required'=>"Bạn chưa nhập tên thể loại!",
    		'category_name.min'=>"Tên thể loại phải lớn hơn 5 ký tự !",
    		'category_name.max'=>"Tên thể loại phải nhỏ hơn 50 ký tự !",
    	]);
    	$TheLoaiTruyen=theloaitruyen::find($id);
    	$TheLoaiTruyen->tentheloai=$req->category_name;
    	$TheLoaiTruyen->tenkhongdau=convert_vi_to_en($req->category_name);
    	$TheLoaiTruyen->theloaicha=$req->parent_category;
    	$TheLoaiTruyen->save();
    	return redirect('admin/theloaitruyen/sua/'.$id)->with('thongbao','Sửa thành công!'); 	
    }
    public function delete_cate_story($id)
    {
    	$TheLoaiTruyen=theloaitruyen::find($id);
    	theloaitruyen::destroy($id);
    	return redirect("admin/theloaitruyen/danhsach")->with('thongbao2','Xóa thành công!');
    }
     public function search_live(Request $req)
    {
    		$data='';
    		$links='';
    		$cout_page='';
    		
    		$query=$req->get('query');
    		if($query!='')
    		{
    			
    			$theloaitruyen= theloaitruyen::where('tentheloai','like','%'.$query.'%')->orderBy('id', 'desc')->get();
    			if($theloaitruyen->count()>0)
    			{
    				foreach ($theloaitruyen as $tlt) {
    					$theloai='';
    					if($tlt->theloaicha!='')
    					{
    						$theloai=$tlt->theloai->tentheloai;
    					}else
    					{
    						$theloai="Không có";
    					}
    					$data.='  <tr>
								       <td align="center"><a class="btn btn-primary" href="admin/theloaitruyen/sua/'.$tlt->id.'"><em class="fas fa-pencil-alt"></em></a> <a href="admin/theloaitruyen/xoa/'.$tlt->id.'" class="btn btn-danger" onclick="return confirm(\'Có thể bạn sẽ xóa toàn bộ truyện thuộc thể loại này ?\')"><em class="fa fa-trash"></em></a>
								       </td> 
								       <td class="hidden-xs">'.$tlt->id.'</td> 
								       <td>'.$tlt->tentheloai.'</td>
								       <td>'.$theloai.'</td>
								      </tr>';
      							
    				}
    			$cout_page='Tìm thấy '.$theloaitruyen->count().' kết quả';
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
