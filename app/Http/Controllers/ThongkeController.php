<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongkeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_name= "trang chủ meta_name";
        $meta_title = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();

        //end seo //

        return view('admin.thongke.index')->with([
            'meta_desc' => $meta_desc,
            'meta_name' => $meta_name,
            'meta_title' => $meta_title,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
