<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chuong;
use App\Models\truyen;
use Illuminate\Support\Facades\Session;

class chuongController extends Controller
{
    //
    public function load_chapter($id)
    {
    	$chuong=chuong::where('id_truyen','=',$id)->paginate(Session::get('paginate'));
    	$truyen=truyen::find($id);
    	return view('admin.chuong.list',['chuong'=>$chuong,'truyen'=>$truyen]);
    }
    public function load_add_chapter($id)
    {
    	$truyen=truyen::find($id);
    	return view('admin.chuong.add',['truyen'=>$truyen]);
    }
    public function post_add_chapter(Request $req)
    {
    	$this->validate($req,
    		[
    			'tenchuong'=>'min:5|max:100|required',
    			'noidung'=>'min:100|required'
    		],
    		[
    			'tenchuong.min'=>"Tên chương phải từ 10 tới 100 ký tự !",
    			'tenchuong.max'=>"Tên chương phải từ 10 tới 100 ký tự !",
    			'tenchuong.required'=>"Tên chương không được bỏ trống !",
    			'noidung.min'=>"Nội dung quá ngắn !",
    			'noidung.required'=>"Nội dung không được bỏ trống !"
    		]);
        $truyen=truyen::find($req->id_truyen);
        $truyen->trangthai=$req->trangthai;
        $truyen->save();
    	$chuong= new chuong();
    	$chuong->ten=$req->tenchuong;
    	$chuong->tenkhongdau=convert_vi_to_en($req->tenchuong);
    	$chuong->noidung=$req->noidung;
    	$chuong->id_truyen=$req->id_truyen;
    	$chuong->save();
    	return redirect('admin/chuong/themmoi/'.$req->id_truyen)->with('thongbao',"Thêm mới thành công!");
    }
    public function load_edit_chapter($id)
    {
    	$chuong=chuong::find($id);
    	return view('admin.chuong.edit',['chuong'=>$chuong]);
    }
    public function post_edit_chapter($id,Request $req)
    {
    	$this->validate($req,
    		[
    			'tenchuong'=>'min:5|max:100|required',
    			'noidung'=>'min:100|required'
    		],
    		[
    			'tenchuong.min'=>"Tên chương phải từ 10 tới 100 ký tự !",
    			'tenchuong.max'=>"Tên chương phải từ 10 tới 100 ký tự !",
    			'tenchuong.required'=>"Tên chương không được bỏ trống !",
    			'noidung.min'=>"Nội dung quá ngắn !",
    			'noidung.required'=>"Nội dung không được bỏ trống !"
    		]);
    	$chuong=chuong::find($id);
        $truyen=truyen::find($chuong->id_truyen);
        $truyen->trangthai=$req->trangthai;
        $truyen->save();
    	$chuong->ten=$req->tenchuong;
    	$chuong->tenkhongdau=convert_vi_to_en($req->tenchuong);
    	$chuong->noidung=$req->noidung;
    	$chuong->save();
    	return redirect('admin/chuong/sua/'.$id)->with('thongbao',"Sửa thành công!");
    }
    public function delete_chapter($id)
    {
    	chuong::destroy($id);
    	$prev_link=url()->previous();
    	return back()->with('thongbao',"Xóa thành công!");
    }
    public function search_live(Request $req)
    {
    		$data='';
    		$links='';
    		$cout_page='';
    		
    		$query=$req->get('query');
    		if($query!='')
    		{
    			
    			$chuong= chuong::where('ten','like','%'.$query.'%')->orderBy('id', 'desc')->get();
    			if($chuong->count()>0)
    			{
    				foreach ($chuong as $chap) {
    					$data.=' <tr> 
						       <td align="center"><a class="btn btn-primary" href="admin/chuong/sua/'.$chap->id.'"><em class="fas fa-pencil-alt"></em></a> <a class="btn btn-danger" href="admin/chuong/xoa/'.$chap->id.'" onclick="return confirm(\'Bạn có thực sự muốn xóa!\')"><em class="fa fa-trash"></em></a>  
						       </td> 
						       <td class="hidden-xs">'.$chap->ten.'</td> 
						       <td>'.htmlspecialchars_decode($chap->noidung).'</td> 
						        </tr> ' ;
      							
    				}
    			$cout_page='Tìm thấy '.$chuong->count().' kết quả';
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
