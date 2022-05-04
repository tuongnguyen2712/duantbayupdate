@extends('admin.layout-Admin')

@section('content')
<style>
    .imgpreview{
        height: auto;
        width: 24rem;
        margin-top: 1rem;
        border: 5px solid;
    }
    .modal-dialog{
        width: 58em;
    }
    .modal-content{
        padding: 1em;
    }
    .tab {
    /* display: none; */
    }
    textarea{
        width: 100%;
    }
    .bottom-sanpham{
        margin-top: 2em;
    }
    .bottom-sanpham button{
        margin-right: 1em;
        border-radius: 5%;
        font-size: 2rem;
    }
    .bottom-sanpham button:hover{
        border: 4px solid;
        box-shadow: 2px 5px #888888;
    }
    .form-horizontal .form-group{
        margin:0;
        padding: 0
    }
    .form-group .col-lg-10 img.objectcv{
        height: auto;
        width: 24rem;
        margin-top: 1rem;
        border: 5px solid;
    }
</style>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> EDIT DANH MỤC SẢN PHẨM </h3>
    <!-- BASIC FORM VALIDATION -->
    <div class="row mt">
        <div class="col-lg-12">

          <div class="form-panel">
            <div class=" form">
              <form  action="{{route('sanpham.update',$data->id)}}" novalidate method="post"  enctype="multipart/form-data" class="cmxform form-horizontal style-form" id="commentForm" id="regForm">
                @csrf
                {!! method_field('patch') !!}
                <div class="form-group ">
                <h4><i class="fa fa-angle-right"></i> Sản Phẩm</h4>
                </div>
                <div class="form-group ">
                  <label  class="control-label col-lg-2">Tên Danh Mục</label>
                  <div class="col-lg-10">
                    <select class="form-control select2" name="iddanhmuc">
                        @foreach ($danhmuc as $item)
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group ">
                <label  class="control-label col-lg-2"> Tên Sản Phẩm </label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" value="{{$data->name}}" name="name" id="f-name" class="form-control">
                  </div>
                </div>
                <div class="form-group ">
                    <label  class="control-label col-lg-2"> Slug </label>
                      <div class="col-lg-10">
                        <input type="text" placeholder="" value="{{$data->slug}}" name="slug" id="f-name" class="form-control">
                      </div>
                    </div>
                <div class="form-group ">
                  <label  class="control-label col-lg-2">Hình Ảnh</label>
                  <div class="col-lg-10">
                    <img width="200px" height="100px" class="objectcv" src="{{ asset('uploads') }}/{{ json_decode($data->img)[0] }}" alt="">
                    <input type="file"  name="imgs" value="{{ asset('uploads') }}/{{ json_decode($data->img)[0] }}"  onchange="previewImg(event)" parsley-trigger="change" required
                  class="form-control" id="img" multiple>
                  </div>
                </div>
                <div class="form-group ">

                    <label for="" class="control-label col-lg-2">mô tả</label>
                    <div class="col-lg-10">
                        <textarea  name="mota" id="summernote" class="form-control" rows="3">{{$data->mota}}> </textarea>

                </div>
                <div class="form-group ">

                    <label for="" class="control-label col-lg-2">Hình Ảnh</label>
                    <div class="col-lg-10">
                        <textarea  name="noidung" id="summernote1" class="form-control" rows="3">{{$data->noidung}}> </textarea>

                </div>
                <div class="form-group ">
                    <label  class=" col-lg-2">Giá</label>
                    <div class="col-lg-10">
                        <input type="number" placeholder="" value="{{$data->dongia}}" name="gia" id="f-name" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group ">
                    <h4><i class="fa fa-angle-right"></i> Sản Phẩm Chi Tiết </h4>
                </div>
                <div class="form-group ">
                    <label  class="control-label col-lg-2">Số lượt mua</label>
                    <div class="col-lg-10">
                        <input type="number" placeholder="" value="{{$data->soluotmua}}" name="soluotmua" id="f-name" class="form-control">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label col-lg-2">Tồn Kho</label>
                    <div class="col-lg-10">
                        <input type="number" placeholder="" value="{{$data->tonkho}}" name="tonkho" id="f-name" class="form-control">
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label col-lg-2">Đơn Giá</label>
                    <div class="col-lg-10">
                        <input type="number" placeholder="" value="{{$data->dongia}}" name="dongia" id="f-name" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group ">
                    <h4><i class="fa fa-angle-right"></i> SEO </h4>
                </div>
                <div class="form-group ">
                    <label class="control-label col-lg-2">Tiêu Đề Sản phẩm</label>
                    <div class="col-lg-10">
                        <textarea type="text" placeholder="" name="meta_desc" id="f-name" class="form-control">{{$data->meta_desc}}</textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label  class="control-label col-lg-2">Mô Tả Tiêu Đề</label>
                    <div class="col-lg-10">
                        <textarea type="text" placeholder="" name="meta_title" id="f-name" class="form-control">{{$data->meta_title}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Lưu</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
      </div>

  </section>
@endsection
