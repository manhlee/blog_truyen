<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\truyen;
use Illuminate\Support\Facades\Session;
use App\Models\theloaitruyen;
use App\Models\tacgia;
use App\Models\view_truyen;

class TruyenController extends Controller
{
    //
    public function load_list()
    {
    	$truyen=view_truyen::paginate(Session::get('paginate'));
    	return view('admin.truyen.list',['truyen'=>$truyen]);
    }
    public function load_add()
    {
    	$TheLoaiTruyen=theloaitruyen::all();
    	$TacGia=tacgia::all();
    	return view('admin.truyen.add',['TacGia'=>$TacGia,'TheLoaiTruyen'=>$TheLoaiTruyen]);
    }

    public function post_add(Request $req)
    {
      $this->validate($req,
      		[
                'file' => 'image|max:2028|required',
                'TenTruyen'=>'max:200|min:3|required',
                'TheLoaiTruyen'=>'required',
                'TacGia'=>'required',
            ],
            [
            	'TenTruyen.max'=>"Tên truyện nhiều nhất 200 ký tự !",
            	'TenTruyen.min'=>"Tên truyện ít nhất 3 ký tự !",
            	'TenTruyen.required'=>"Tên truyện không được bỏ trống !",
            	'file.image' => 'Định dạng không cho phép !',
            	'file.max' => 'Kích thước file quá lớn !',
            	'file.required'=>'Bạn chưa chọn ảnh !',
            	'TheLoaiTruyen.required'=>"Bạn chưa chọn thể loại truyện !",
            	'TacGia.required'=>"Bạn chưa chọn tác giả !",
            ]);   
       		$file=$req->file;
        	// Kiểm tra file hợp lệ
            // Lấy tên file
            $file_name = random_string(20).'.'.$file->getClientOriginalExtension();
            // Lưu file vào thư mục upload với tên là biến $filename
            $file->move('upload',$file_name);
            $truyen=new truyen();
            $truyen->tentruyen=$req->TenTruyen;
            $truyen->tenkhongdau=convert_vi_to_en($req->TenTruyen);
            $truyen->hinhanh=$file_name;
            $truyen->gioithieu=$req->GioiThieu;
            $truyen->user_id=session('admin')['id'];
            $truyen->id_theloaitruyen=$req->TheLoaiTruyen;
            $truyen->id_tacgia=$req->TacGia;
            $truyen->save();
            return redirect("admin/truyen/themmoi")->with('thongbao',"Thêm mới thành công!");
	}
	public function load_edit($id)
	{
		$truyen=truyen::find($id);
		$TheLoaiTruyen=theloaitruyen::all();
		$TacGia=tacgia::all();
		return view('admin.truyen.edit',['truyen'=>$truyen,'TheLoaiTruyen'=>$TheLoaiTruyen,'TacGia'=>$TacGia]);
	}
    public function post_edit(Request $req, $id)
    {
        $this->validate($req,
            [
                'file' => 'image|max:2028',
                'TenTruyen'=>'max:200|min:3|required',
                'TheLoaiTruyen'=>'required',
                'TacGia'=>'required',
            ],
            [
                'TenTruyen.max'=>"Tên truyện nhiều nhất 200 ký tự !",
                'TenTruyen.min'=>"Tên truyện ít nhất 3 ký tự !",
                'TenTruyen.required'=>"Tên truyện không được bỏ trống !",
                'file.image' => 'Định dạng không cho phép !',
                'file.max' => 'Kích thước file quá lớn !',
                'TheLoaiTruyen.required'=>"Bạn chưa chọn thể loại truyện !",
                'TacGia.required'=>"Bạn chưa chọn tác giả !",
            ]);
        $truyen=truyen::find($id);
        $file_name="";
        if($req->hasFile('file'))
        {
            $path = 'upload/'.$truyen->hinhanh;
            if(is_file($path)) {
                unlink($path);
            }
            $file=$req->file;
            // Kiểm tra file hợp lệ
            // Lấy tên file
            $file_name = random_string(20).'.'.$file->getClientOriginalExtension();
            // Lưu file vào thư mục upload với tên là biến $filename
            $file->move('upload',$file_name);
        }
            $truyen->tentruyen=$req->TenTruyen;
            $truyen->tenkhongdau=convert_vi_to_en($req->TenTruyen);
            if($file_name!="")
            {
                $truyen->hinhanh=$file_name;
            }
            $truyen->gioithieu=$req->GioiThieu;
            $truyen->id_theloaitruyen=$req->TheLoaiTruyen;
            $truyen->id_tacgia=$req->TacGia;
            $truyen->save();
            return redirect('admin/truyen/sua/'.$id)->with('thongbao',"Sửa thành công!");
    }
    public function delete_story($id)
    {
        truyen::destroy($id);
        return redirect('admin/truyen/danhsach')->with('thongbao',"Xóa thành công!");
    }
  public function search_live(Request $req)
    {
            $data='';
            $links='';
            $cout_page='';
            
            $query=$req->get('query');
            if($query!='')
            {
                $result =view_truyen::where('tentruyen','like','%'.$query.'%')->orWhere('tentacgia','like','%'.$query.'%')->orWhere('tentheloai','like','%'.$query.'%')->get();
                if($result->count()>0)
                {
               
                    foreach ($result as $rq) {
                        $trangthai="";
                        if($rq->trangthai==1)
                        {
                            $trangthai='<span class="badge badge-danger">Chưa xong</span>';
                        }else{
                            $trangthai= '<span class="badge badge-success">Đã xong</span>';
                        }
                        $data.='  <tr>
                                       <td align="center">
                                          <a class="btn btn-primary" href="admin/truyen/sua/'.$rq->id.'"><em class="fas fa-pencil-alt"></em></a>
                                          <a class="btn btn-danger" onclick="return confirm(\'Có thể bạn sẽ xóa toàn bộ chương thuộc truyện này!\')" href="admin/truyen/xoa/'.$rq->id.'"><em class="fa fa-trash"></em></a>
                                          <a class="btn btn-success" href="admin/truyen/danhsachchuong/'.$rq->id.'"><em class="fa fa-book"></em></a>
                                       </td> 
                                       <td class="hidden-xs"><b><i>'.$rq->tentruyen.'</i></b>
                                        '.$trangthai.'
                                       </td> 
                                       <td>'.$rq->tentheloai.'</td> 
                                       <td>'.$rq->tentacgia.'</td>
                                       <td>'.$rq->name.'</td>
                                       <td>'.$rq->sochuong.'</td>
                                    </tr>';
                                
                    }
                $cout_page='Tìm thấy '.$result->count().' kết quả';
            }else{
                $data="<tr>
                    <td align='center' colspan='6'>Không tìm thấy!</td>
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
