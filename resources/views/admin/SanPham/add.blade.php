@extends('admin.layout-Admin')

@section('content')
<style>
        .imgpreview{
        height: 20rem;
        width: 20rem;
        border: 10px solid #eaeaea;
        border-radius: 25px;
    }
    .form-group .col-lg-offset-2{
        margin:0;
        padding: 0;
        margin-left: 7.666667%;
    }
</style>
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12 mt">
                <div class="row content-panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <h3 style="text-align: center; color:#48cfad">Thêm Mới Sản Phẩm</h3>
                    </li>
                    </ul>
                </div>
                <!-- /panel-heading -->
                <div class="panel-body">
                    <div class="tab-content">
                    <form action="{{route('sanpham.store')}}"  enctype="multipart/form-data" method="post">
                            @csrf
                    <div id="overview" class="tab-pane active">
                        <div class="row">

                            <div class="col-md-6 detailed">
                                <div class="row mt">
                                    <div class="col-lg-12">
                                        <h4><i class="fa fa-angle-right"></i> Sản Phẩm</h4>
                                        <div class="form-panel">
                                        <div class=" form">
                                            <div class="cmxform form-horizontal style-form" id="commentForm" >
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Danh Mục</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control select2" name="iddanhmuc">
                                                        @foreach ($danhmuc as $item)
                                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Sản Phẩm</label>
                                                <div class="col-lg-10">
                                                <input class="form-control " id="cemail" type="text" name="name" required />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Hình Ảnh</label>
                                                <div class="col-lg-10">
                                                    <input type="file" name="imgs"  onchange="previewImg(event)" parsley-trigger="change" required
                                                    class="form-control" id="img" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Mô Tả</label>
                                                <div class="col-lg-10">
                                                <textarea class="form-control " id="summernote" name="mota" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Nội Dung</label>
                                                <div class="col-lg-10">
                                                <textarea class="form-control " id="summernote1" name="noidung" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Giá</label>
                                                <div class="col-lg-10">
                                                <input class="form-control " id="cemail" type="number" name="giamgia" required />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /form-panel -->
                                    </div>
                                <!-- /col-lg-12 -->
                                </div>
                        <!-- /row -->
                            </div>
                                <!-- /col-md-6 -->
                            <div class="col-md-6 detailed">
                                <div class="row mt">
                                    <div class="col-lg-12">
                                        <h4><i class="fa fa-angle-right"></i> Sản Phẩm Chi Tiết</h4>
                                        <div class="form-panel">
                                        <div class=" form">
                                            <div class="cmxform form-horizontal style-form" id="commentForm" >
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Số Lượt Mua </label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="cemail" type="number" name="soluotmua" required />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Tồn Kho </label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="cemail" type="number" name="tonkho" required />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Đơn Giá </label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="cemail" type="number" name="dongia" required />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <h4><i class="fa fa-angle-right"></i> SEO Sản Phẩm</h4>
                                        <div class="form-panel">
                                        <div class=" form">
                                            <div class="cmxform form-horizontal style-form" id="commentForm" >
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Tiêu Đề Sản Phẩm </label>
                                                <div class="col-lg-10">
                                                    <textarea class="form-control " name="meta_desc"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Mô tả Tiêu Đề </label>
                                                <div class="col-lg-10">
                                                    <textarea class="form-control "  name="meta_title"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /form-panel -->
                                    </div>
                                <!-- /col-lg-12 -->
                                </div>
                            </div>
                            <!-- /col-md-6 -->


                                </div>
                                <!-- /OVERVIEW -->

                                <div class="form-group" style="text-align: center">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-theme" type="submit">Tạo Mới Sản Phẩm </button>
                                    </div>
                                  </div>
                    </div>
                    <!-- /tab-pane -->

                    </form>
                    <!-- /tab-pane -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /panel-body -->
                </div>
                <!-- /col-lg-12 -->
            </div>
        </div>
    </section>
@endsection
