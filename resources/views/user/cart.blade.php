
@if (Session::has("cart") != null)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-2 -mb-2" style="color:red;">

        </div>
        <div class="col-md-8">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">tên sản phẩm </th>
                    <th scope="col">qty</th>
                    <th scope="col">đơn giá</th>
                    <th scope="col">tổng</th>
                    <th scope="col">xóa sản phẩm</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach (Session::get('cart')->products as $item)
                        <tr>
                        <th scope="row">{{$item['productInfo']->name}}</th>
                        <th scope="row">{{$item['quanty']}}</th>
                        <th scope="row">{{number_format($item['productInfo']->giamgia)}}</th>
                        <th scope="row">{{number_format($item['productInfo']->giamgia * $item['quanty'])}}</th>
                        <td><a class="si-close" style="font-size: 45px;" href="#"><i class="fa fa-close" data-id="{{$item['productInfo']->id}}"></i></a></td>
                      </tr>
                    @endforeach
                    <tr>
                        <th>
                            <h5>Tổng tiền:  {{number_format(Session::get('cart')->totalPrice)}}</h5>
                        </th>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endif
