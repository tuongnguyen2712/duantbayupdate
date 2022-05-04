<?php

namespace App\Http\Controllers;

use App\Repositories\DanhMuc\DanhMucRepository;
use App\Repositories\SanPham\SanPhamRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $SanPham;
    private $DanhMuc;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SanPhamRepository $SanPham,
        DanhMucRepository $DanhMuc
    )
    {
        $this->middleware('auth');
        $this->SanPham = $SanPham;
        $this->DanhMuc = $DanhMuc;


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_title= "trang chủ meta_titles";
        $site_name = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();
        $meta_mota = "trang chủ";

        //end seo //

        $sanPham = $this->SanPham->getsanpham();
        $danhMuc = $this->DanhMuc->getAllDanhMuc();
        return view('user.layout',compact('sanPham','danhMuc'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'site_name' => $site_name,
            'url_canonical' => $url_canonical,
        ]);
        // ->with('meta_desc',$meta_desc)->with('meta_title',$meta_title)->with('site_name',$site_name)->with('url_canonical',$url_canonical);
    }
    public function sanphamdetail(Request $request ,$slug)
    {
        $sanPham = $this->SanPham->getsanphamdetail($slug);

        foreach ($sanPham as $item) {
            $img = url('/') .'/uploads/' . json_decode($item->img)[0];
            $meta_desc = $item->meta_desc;
            $meta_title = $item->meta_title;
            $site_name = $item->name;
            $meta_img = url($img);

            $modified_time = date($item->created_at);
            $url_canonical = $request->url();
        }

        return view('user.sanpham',compact('sanPham'))->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'site_name' => $site_name,
            'meta_img' => $meta_img,
            'url_canonical' => $url_canonical,
            'modified_time' => $modified_time,
        ]);
    }
}
