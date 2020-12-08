<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tacgia;
use Illuminate\Support\Facades\Session;

class TacGiaController extends Controller
{
   public function load_list()
   {
   		$TacGia=tacgia::paginate(Session::get('paginate'));
   		return view('admin.TacGia.list',['TacGia'=>$TacGia]);
   }
   public function load_add()
   {
   		return view('admin.TacGia.add');
   }
   public function post_add(Request $req)
   {
   		$this->validate($req,
   		[
   			'TenTacGia'=>'required|max:50|min:5|unique:tacgia,ten',
   			'GioiThieu'=>'|min:20|nullable',
   		],
   		[
   			'TenTacGia.required'=>"Bạn chưa nhập tên tác giả !",
   			'TenTacGia.max'=>"Tên tác giả phải nhỏ hơn 50 ký tự !",
   			'TenTacGia.min'=>"Tên tác giả phải lớn hơn 5 ký tự !",
   			'TenTacGia.unique'=>"Tên tác giả đã tồn tại !",
   			'GioiThieu.min'=>"Lời giới thiệu phải nhiều hơn 20 ký tự !"
   		]);
   		$tacgia=new tacgia();
   		$tacgia->ten=$req->TenTacGia;
   		$tacgia->tenkhongdau=convert_vi_to_en($req->TenTacGia);
   		$tacgia->gioithieu=$req->GioiThieu;
   		$tacgia->save();
   		return redirect('admin/tacgia/themmoi')->with('thongbao',"Thêm mới thành công !");
   }
   public function load_edit($id)
   {
   		$TacGia=tacgia::find($id);
   		return view('admin.TacGia.edit',['TacGia'=>$TacGia]);
   }
   public function post_edit(Request $req,$id)
   {
   		$this->validate($req,
   		[
   			'TenTacGia'=>'required|max:50|min:5',
   			'GioiThieu'=>'|min:20|nullable',
   		],
   		[
   			'TenTacGia.max'=>"Tên tác giả phải nhỏ hơn 50 ký tự !",
   			'TenTacGia.min'=>"Tên tác giả phải lớn hơn 5 ký tự !",
   			'TenTacGia.unique'=>"Tên tác giả đã tồn tại !",
   			'GioiThieu.min'=>"Lời giới thiệu phải nhiều hơn 20 ký tự !"
   		]);
   		$TacGia=tacgia::find($id);
   		$TacGia->ten=$req->TenTacGia;
   		$TacGia->tenkhongdau=convert_vi_to_en($req->TenTacGia);
   		$TacGia->gioithieu=$req->GioiThieu;
   		$TacGia->save();
  		return redirect('admin/tacgia/sua/'.$id)->with('thongbao','Sửa thành công !');
   }
   public function delete_author($id)
   {
   		tacgia::destroy($id);
   		return redirect('admin/tacgia/danhsach')->with('thongbao2','Xóa thành công !');
   }
  	public function search_live(Request $req)
    {
    		$data='';
    		$links='';
    		$cout_page='';
    		
    		$query=$req->get('query');
    		if($query!='')
    		{
    			
    			$TacGia= tacgia::where('ten','like','%'.$query.'%')->orderBy('id', 'desc')->get();
    			if($TacGia->count()>0)
    			{
    				foreach ($TacGia as $tg) {
    					$data.='  <tr> 
							       <td align="center"><a class="btn btn-primary" href="admin/tacgia/sua/'.$tg->id.'"><em class="fas fa-pencil-alt"></em></a> <a class="btn btn-danger" href="admin/tacgia/xoa/'.$tg->id.'" onclick="return confirm(\'Có thể bạn sẽ xóa toàn bộ truyện của tác giả này !\')"><em class="fa fa-trash"></em></a>
							       </td> 
							       <td class="hidden-xs">'.$tg->id.'</td> 
							       <td>'.$tg->ten.'</td> 
      							</tr>' ;
      							
    				}
    			$cout_page='Tìm thấy '.$TacGia->count().' kết quả';
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
