<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;

class ListCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meta_desc = "CÔNG TY TNHH DỊCH VỤ CÔNG NGHỆ TBAY - Thiết kế website chuyên nghiệp toàn quốc. Đăng ký tên miền, hosting, ssl, email doanh nghiệp.";
        $meta_title= "trang giỏ hàng";
        $site_name = "Thiết kế website chuyên nghiệp - CT TNHH DV CÔNG NGHỆ TBAY";
        $url_canonical = $request->url();

        return view('user.list-cart')->with([
            'meta_desc' => $meta_desc,
            'meta_title' => $meta_title,
            'site_name' => $site_name,
            'url_canonical' => $url_canonical,
        ]);;
    }

    public function DeleteListCart( Request $request, $id){
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
    return view('user.list-cart',compact('newCart'));
    }

    public function UpdateListCart( Request $request, $id, $quanty){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updatecart($id, $quanty);
        if(Count($newCart->products) > 0){
            $request->Session()->put('cart', $newCart);
        }
        else{
            $request->Session()->forget('cart');
        }
        return view('user.list-cart',compact('newCart'));
    }

    public function Saveall(Request $request){
        dd($request->all());
        // foreach ($request->data as $item){
        //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //     $newCart = new Cart($oldCart);
        //     $newCart->updatecart($id, $quanty);
        // }
        // $request->session()->put('cart', $newCart);
        // return view('user.list-cart',compact('newCart'));
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
