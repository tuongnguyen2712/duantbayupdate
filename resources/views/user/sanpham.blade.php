@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-2 -mb-2" style="color:red;">

        </div>
        <div class="col-md-8">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">tên sản phẩm </th>
                    <th scope="col">số lượt mua</th>
                    <th scope="col">đơn giá</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($sanPham as $sp)
                        <tr>
                        <th scope="row">1</th>
                        <td>{{$sp->name}}</td>
                        <td>{{$sp->soluong}}</td>
                        <td>{{$sp->dongia}}</td>
                    @endforeach

                      </tr>

                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

