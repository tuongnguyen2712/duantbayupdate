<?php


namespace App\Repositories\SanPham;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use App\Repositories\SanPham\SanPhamRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SanPhamRepository extends BaseRepository implements SanPhamRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return \App\Models\SanPham::class;
    }

    public function getSanPhamJoinDanhMuc()
    {
        return $this->model->select("sanpham.*", "danhmuc.name AS tendm",
            DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
            DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
        )
            ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id")
            ->where('sanpham.trangthai', '=', Controller::TRANGTHAI_SANPHAM)
            ->orderBy('sanpham.id', 'DESC')
            ->get();
    }

    public function DemSanPham()
    {
        return DB::table('sanpham')->where('sanpham.trangthai', '=', 1)->count();
    }


    public function getsanphamdetail($slug)
    {
        return $this->model->select("sanpham.*")
            ->where('sanpham.slug', '=', $slug)
            ->where('sanpham.trangthai', '=', 1)
            ->get();
    }
    public function getsanphamdetailadmin($slug)
    {
        return $this->model->select("sanpham.*")
            ->where('sanpham.slug', '=', $slug)
            ->first();
    }

    public function getsanpham()
    {
        return $this->model->limit(6)
            ->where('sanpham.trangthai', '=', 1)
            ->orderBy('id', 'DESC')
            ->get();
    }
    public function sanphamcart($id)
    {
        return $this->model
            ->where('sanpham.id', '=', $id)
            ->first();
    }
    public function getsanphamiddanhmuc($slug){
        return $this->model->select('sanpham.*', 'sanpham.id','danhmuc.id AS iddm','danhmuc.name AS danhmuc')
        ->join('danhmuc', 'sanpham.iddanhmuc', '=', 'danhmuc.id')
        ->where('danhmuc.slug', '=',$slug)
        ->first();
    }

    // public function getsanphamtimkiem()
    // {
    //     return $this->model->select('sanpham.*', 'sanphamchitiet.dongia AS dongiasp')
    //         ->where('sanpham.trangthai', '=', Controller::TRANGTHAI_SANPHAM)
    //         ->join("sanphamchitiet", "sanphamchitiet.idsanpham", "=", "sanpham.id")
    //         ->orderBy('id', 'DESC')
    //         ->get();
    // }
    // public function searchsanpham($valueSearch){
    //     return $this->model->select("sanpham.*", "danhmuc.name AS tendm",
    //         DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
    //         DB::raw('(select ml from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as thetich'),
    //         DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
    //         )
    //         ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id" )
    //         ->where('sanpham.trangthai', '=', Controller::TRANGTHAI_SANPHAM)
    //         ->where('sanpham.name','LIKE','%'.$valueSearch.'%')
    //         ->orderBy('sanpham.id', 'DESC')
    //         ->get();
    // }

    // public function getSanPhamHome()
    // {
    //     return $this->model->select('sanpham.*', 'danhmuc.name AS tendm',
    //         DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
    //         DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
    //     )
    //         ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id")
    //         ->where('sanpham.trangthai', "=", Controller::TRANGTHAI_SANPHAM)
    //         ->orderBy("sanpham.id", "DESC")
    //         ->limit(4)
    //         ->get();
    // }

    // public function GetSanPhamLienQuan($id)
    // {
    //     return $this->model->select('sanpham.*', 'danhmuc.name AS tendm',
    //         DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
    //         DB::raw('(select ml from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as ml'),
    //         DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
    //     )
    //         ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id")
    //         ->where('sanpham.iddanhmuc', $id)
    //         ->where('sanpham.trangthai', Controller::TRANGTHAI_SANPHAM)
    //         ->limit(4)
    //         ->get();
    // }

    // public function GetSanPhamLienQuanKhacIDDM($id)
    // {
    //     return $this->model->select('sanpham.*', 'danhmuc.name AS tendm',
    //         DB::raw('(select dongia from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as dongia'),
    //         DB::raw('(select ml from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as ml'),
    //         DB::raw('(select id from sanphamchitiet where idsanpham  =   sanpham.id   limit 1) as idspct')
    //     )
    //         ->join("danhmuc", "sanpham.iddanhmuc", "=", "danhmuc.id")
    //         ->where('sanpham.iddanhmuc', '!=', $id)
    //         ->where('sanpham.trangthai', Controller::TRANGTHAI_SANPHAM)
    //         ->limit(4)
    //         ->get();
    // }

    public function CheckSanPhamByIdDanhMuc($id)
    {
        return $this->model->select("*")
            ->where('iddanhmuc', $id)
            ->doesntExist();
    }


}
