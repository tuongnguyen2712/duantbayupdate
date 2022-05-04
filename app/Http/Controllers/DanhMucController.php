<?php

namespace App\Http\Controllers;

use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\SanPham\SanPhamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DanhMucController extends Controller
{

    private $DanhMuc;
    private $SanPham;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(DanhMucRepository $DanhMuc, SanPhamRepository $SanPham)
    {
        $this->DanhMuc = $DanhMuc;
        $this->SanPham = $SanPham;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_title= "Danh MỤC meta_titles";
        $meta_name = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();

        $data = $this->DanhMuc->getAll();
        return view('admin.DanhMuc.index', compact('data'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'url_canonical' => $url_canonical,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->img;
        $img =  $file->getClientOriginalName();
        if ($request->meta_title === null) {
            $meta_title = ($request->name);
        }else {
            $meta_title = $request->meta_title;
        }
        if ($request->meta_desc === null) {
            $desc = $request->name;
        }else {
            $desc = $request->meta_desc;
        }
        $data = [
            'meta_desc' => $desc,
            'name'=> $request->name,
            'meta_title' => $meta_title,
            'img'=> $img,
            'slug'=>Str::slug($request->name),
            'loai'=>$request->loai
        ];

        $this->DanhMuc->create($data);
        return redirect('quantri/danhmuc')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$slug)
    {
        $data  = $this->DanhMuc->idDanhMucbyslug($slug);
        $img = url('/') .'/uploads/' . $data->img;
            $meta_desc = $data->meta_desc;
            $meta_name = $data->name;
            $meta_title = $data->meta_title;
            $meta_img = url($img);

            $modified_time = date($data->created_at);
            $url_canonical = $request->url();

        return view('admin.DanhMuc.edit',compact('data'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'meta_img' => $meta_img,
            'modified_time' => $modified_time,
            'url_canonical' => $url_canonical,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name'=> $request->name,
            'slug'=>$request->slug,
            'loai'=>$request->loai
        ];

        if($request->img){
            $file = $request->img;
            $img =  $file->getClientOriginalName();
            $data['img'] = $img;
        }

        $this->DanhMuc->update($id,$data);

        return redirect('quantri/danhmuc')->with('success','Sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CheckDanhMucSanPham=$this->SanPham->CheckSanPhamByIdDanhMuc($id);

        if (empty($CheckDanhMucSanPham) == false){
            $this->DanhMuc->delete($id);
            $message=[
                'message'=>"Xóa danh mục thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
        else{
            $message=[
                'message'=>"Danh mục đã tồn tại dữ liệu.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }
    }
}
