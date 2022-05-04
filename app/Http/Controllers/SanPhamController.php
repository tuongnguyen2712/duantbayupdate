<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\SanPham\SanPhamRepository;
//use Session;
use App\Cart;
use App\Models\DanhMuc;
use App\Repositories\DanhMuc\DanhMucRepository;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Str;



class SanPhamController extends Controller
{
    private $Sanpham;
    private $Danhmuc;

    /**
     * CosoController constructor.
     */
    public function __construct(SanPhamRepository $Sanpham, DanhMucRepository $Danhmuc)
    {
        $this->Sanpham = $Sanpham;
        $this->Danhmuc = $Danhmuc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_title= "trang chủ meta_titles";
        $meta_name = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();
        $meta_mota = "trang chủ";

        //end seo //

        $data = $this->Sanpham->getAll();
        $danhmuc = $this->Danhmuc->getAll();
        return view('admin.SanPham.index',compact('data', 'danhmuc'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'url_canonical' => $url_canonical,
        ]);
    }



    public function cart( Request $request, $id){
        $products = $this->Sanpham->sanphamcart($id);
        if($products != null){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->add($products, $id);
            $request->session()->put('cart', $newCart);
        }
        // dd($newCart);
        return view('user.cart',compact('newCart'));
    }

    public function DeleteCart( Request $request, $id){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteCart($id);
            if(Count($newCart->products) > 0){
                $request->Session()->put('cart', $newCart);
            }
            else{
                $request->Session()->forget('cart');
            }

        // dd($newCart);
        return view('user.cart',compact('newCart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_title= "trang chủ meta_title";
        $meta_name = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();


        $danhmuc = $this->Danhmuc->getAll();
        return view('admin.SanPham.add',compact('danhmuc'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'url_canonical' => $url_canonical,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->imgs === null){
            return $this->handleErrorInput('Vui lòng chọn hình ảnh');
        }
        $img = $request->file('imgs');
        $name = $img->getClientOriginalName();
        $paths[] = $name;
        $demo = json_encode($paths);

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
            'meta_title'=> $meta_title,
            'iddanhmuc'=> $request->iddanhmuc,
            'name'=> $request->name,
            'meta_desc'=>$desc,
            'slug'=>Str::slug($request->name),
            'img'=> $demo,
            "soluotmua"=>0,
            "tonkho"=>$request->tonkho,
            "dongia"=>$request->dongia,
            'mota'=> $request->mota,
            'noidung'=> $request->noidung,
            'giamgia'=> $request->giamgia,
            "trangthai"=>($request->trangthai ) ? 1 : 0,
        ];
        $this->Sanpham->create($data);
        return redirect('quantri/sanpham')->with('success','Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$slug)
    {
        $data = $this->Sanpham->getsanphamdetailadmin($slug);
        $img = url('/') .'/uploads/' . $data->img;
        $meta_desc = $data->meta_desc;
        $meta_title = $data->meta_title;
        $meta_name = $data->name;
        $meta_img = url($img);
        $modified_time = date($data->created_at);
        $url_canonical = $request->url();

        $danhmuc = $this->Danhmuc->getAll();
        return view('admin.SanPham.show', compact('data', 'danhmuc'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'meta_img' => $meta_img,
            'modified_time' => $modified_time,
            'url_canonical' => $url_canonical,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$slug)
    {
        $data = $this->Sanpham->getsanphamdetailadmin($slug);
            $img = url('/') .'/uploads/' . json_decode($data->img)[0];
            $meta_desc = $data->meta_desc;
            $meta_title = $data->meta_title;
            $meta_name = $data->name;
            $meta_img = url($img);

            $modified_time = date($data->created_at);
            $url_canonical = $request->url();


        $danhmuc = $this->Danhmuc->getAll();
        return view('admin.SanPham.edit', compact('data', 'danhmuc'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'meta_name' => $meta_name,
            'meta_img' => $meta_img,
            'url_canonical' => $url_canonical,
            'modified_time' => $modified_time,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if($request->imgs === null){
            return $this->handleErrorInput('Vui lòng chọn hình ảnh');
        }
        $img = $request->file('imgs');
        $name = $img->getClientOriginalName();
        $paths[] = $name;
        $demo = json_encode($paths);

        if ($request->meta_title === null) {
            $meta_title = Str::slug($request->name);
        }else {
            $meta_title = $request->meta_title;
        }
        if ($request->meta_desc === null) {
            $desc = $request->name;
        }else {
            $desc = $request->meta_desc;
        }
        $data = [
            'meta_title'=> $meta_title,
            'iddanhmuc'=> $request->iddanhmuc,
            'name'=> $request->name,
            'meta_desc'=>$desc,
            'slug'=>$request->slug,
            'img'=> $demo,
            "soluotmua"=>$request->soluotmua,
            "tonkho"=>$request->tonkho,
            "dongia"=>$request->dongia,
            'mota'=> $request->mota,
            'noidung'=> $request->noidung,
            'giamgia'=> $request->giamgia,
            "trangthai"=>1,
        ];
        $this->Sanpham->update($slug, $data);

        return redirect('quantri/sanpham')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$CheckYeuThich=$this->YeuThich->CheckSanPhamInYeuThich($id);
        if($id == null){
            $message=[
                'message'=>"Sản phẩm đã tồn tại dữ liệu không được xóa.",
                'icon'=>'warning',
                'error_Code'=>1
            ];
            return $message;
        }else{
            $this->Sanpham->delete($id);
            $message=[
                'message'=>"Xóa sản phẩm thành công.",
                'icon'=>'success',
                'error_Code'=>0
            ];
            return $message;
        }
    }
     public function unactive_product($id){
        DB::table('sanpham')->where('id',$id)->update(['trangthai'=>1]);
        Session::put('message','Hiện Sản Phẩm Thành Công');
        return Redirect::to('quantri/sanpham');
     }
     public function active_product($id){
        DB::table('sanpham')->where('id',$id)->update(['trangthai'=>0]);
        Session::put('message','Ẩn Sản Phẩm Thành Công');
        return Redirect::to('quantri/sanpham');
     }
}
