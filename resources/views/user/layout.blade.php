@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mt-2 -mb-2" style=" height:250px">
            <ul class="list-group">
                @foreach ($danhMuc as $index => $dm)
                <li class="list-group-item  <?php echo ($index == 0) ? 'active' : '';?> ">{{$dm->name}}</li>
                @endforeach

              </ul>
        </div>
        <div class="col-md-9">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">đặt hàng</th>


                  </tr>
                </thead>
                <tbody class="cart-">
                    @foreach ($sanPham as $row)
                        <tr>
                        <th scope="row">1</th>
                        <td><a href="{{ asset('san-pham') }}/{{$row->slug}}">{{$row->name}}</a></td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><a onclick="AddCart({{$row->id}})" href="javascript:0;">Đặt hàng</a></td>

                      </tr>
                    @endforeach

                </tbody>
              </table>
        </div>

    </div>
</div>


@endsection

