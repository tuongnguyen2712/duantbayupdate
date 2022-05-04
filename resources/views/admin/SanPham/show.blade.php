
@extends('admin.layout-Admin')

@section('content')
<section class="wrapper">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice-body">
            <div class="pull-left">
              <h1>TBAY</h1>
              <address>
            <strong>Thiết kế website chuyên nghiệp</strong><br>
            78 Nguyễn Thái Học, Phường Tân Thành,<br>
            Quận Tân Phú, TP.HCM<br>
            <abbr title="Phone"><i class="fa fa-phone"></i></abbr> 0852080383
          </address>
            </div>
            <!-- /pull-left -->
            {{-- <div class="pull-right">
              <img src="{{ asset('uploads') }}/1650602859.png" alt="center" class="img-responsive pull-right" width="100" height="100">
            </div> --}}
            <!-- /pull-right -->
            <div class="clearfix"></div>
            <br>
            <br>
            <br>

            <!-- /col-lg-10 -->
            <table class="table">
              <thead>
                <tr>
                    <th style="width:15%" class="text-center">Thuộc Tính</th>
                    <th style="width:55%"  class="text-left"></th>
                    <th style="width:20%" class="text-right">Giá Trị</th>
                    <th style="width:10%" class="text-right"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tên Sản Phẩm</td>
                  <td></td>
                  <td colspan="2" rowspan="1" class="text-right" style="text-align:center">
                    {{$data->name}}
                    </td>
                </tr>
                <tr>
                    <td>Số Lượt Mua</td>
                    <td></td>
                    <td colspan="2" rowspan="1" class="text-right" style="text-align:center">
                        {{$data->soluotmua}}
                    </td>
                  </tr>
                  <tr>
                    <td>Tồn Kho</td>
                    <td></td>
                    <td colspan="2" rowspan="1" class="text-right" style="text-align:center">
                        {{$data->tonkho}}
                    </td>
                  </tr>
                  <tr>
                    <td>Đơn Giá</td>
                    <td></td>
                    <td colspan="2" rowspan="1" class="text-right" style="text-align:center">
                        {{number_format($data->dongia)}}
                    </td>
                  </tr>
                  <tr>
                    <td>Giảm Giá</td>
                    <td></td>
                    <td colspan="2" rowspan="1" class="text-right" style="text-align:center">
                        {{number_format($data->giamgia)}}
                    </td>
                  </tr>
                <tr>
                  <td colspan="2" rowspan="4">
                    <h4>Mô Tả</h4>
                    <p> {{$data->mota}} </p>
                    <h4> Nội Dung </h4>
                    <p> {{$data->noidung}} </p>
                </tr>
                <tr>
                    <td colspan="2" rowspan="4">
                      <h4>Hình Ảnh</h4>
                      <p><div class="project-wrapper">
                        <div class="project">
                          <div class="photo-wrapper">
                            <div class="photo">
                        <a class="fancybox" href="{{ asset('uploads') }}/{{ json_decode($data->img)[0] }}"><img class="img-responsive" src="{{ asset('uploads') }}/{{ json_decode($data->img)[0] }}" height="auto" width="300px" alt="center"></a>
                        </div>
                        <div class="overlay"></div>
                        </div>
                        </div>
                    </div></p>
                </tr>

              </tbody>
            </table>
            <br>
            <br>
          </div>
          <!--/col-lg-12 mt -->
  </section>
  @endsection
