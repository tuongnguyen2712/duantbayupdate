@extends('admin.layout-Admin')

@section('content')

<style>
    .form-group .col-lg-10 img.objectcv{
        height: auto;
        width: 24rem;
        margin-top: 1rem;
        border: 5px solid;
    }
    .imgpreview{
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
          <form data-parsley-validate action="{{route('danhmuc.update',$data->id)}}" novalidate method="post"  enctype="multipart/form-data" class="form-horizontal style-form">
            @csrf
            {!! method_field('patch') !!}
            <div class="form-group has-success">
              <label class="col-lg-2 control-label">Tên Danh Mục </label>
              <div class="col-lg-10">
                <input type="text" placeholder="" id="f-name" name="name" value="{{$data->name}}" class="form-control">
              </div>
            </div>
            <div class="form-group has-success">
                <label class="col-lg-2 control-label">Slug </label>
                <div class="col-lg-10">
                  <input type="text" placeholder="" id="f-name" name="slug" value="{{$data->slug}}" class="form-control">
                </div>
              </div>
            <div class="form-group has-error">
              <label class="col-lg-2 control-label"> Hình Ảnh </label>
              <div class="col-lg-10">
                <img width="200px" height="100px" class="objectcv" src="{{ asset('uploads') }}/{{$data->img}}" alt="">
                <input type="file" name="img"  onchange="previewImg(event)" parsley-trigger="change" required
                class="form-control" id="img">
              </div>
            </div>
            <div class="form-group has-warning">
              <label class="col-lg-2 control-label">Loại</label>
              <div class="col-lg-10">
                @php
                $array = [
                             ['id'=>1,'name'=>"Dịch Vụ"],
                             ['id'=>2,'name'=>"Sản Phẩm"],
                             ['id'=>3,'name'=>"Bài Viết"],
                             ['id'=>4,'name'=>"Thương Hiệu"]
                         ];
             @endphp
             <select class="form-control select2" name="loai">
                 @foreach ($array as $item)
                     @if ($data->loai == $item['id'])
                         <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                     @else
                         <option value="{{$item['id']}}" >{{$item['name']}}</option>
                     @endif
                 @endforeach
             </select>
              </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-2 control-label"> SEO DANH MỤC </label>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-2 control-label"> Tiêu Đề Danh Mục </label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="meta_desc">{{$data->meta_desc}}</textarea>
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-lg-2 control-label"> Mô Tả Tiêu Đề Danh Mục </label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="meta_title">{{$data->meta_title}}</textarea>
                </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-theme" type="submit">lưu</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /form-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
  </section>
@endsection
