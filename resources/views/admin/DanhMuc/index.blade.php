@extends('admin.layout-Admin')

@section('content')
<style>
    .form-horizontal .form-group{
        margin:0;
        padding: 0
    }
    .imgpreview{
        height: 20rem;
        width: 20rem;
        border: 10px solid #eaeaea;
        border-radius: 25px;
    }
</style>
<section class="wrapper" >
      <h3><i class="fa fa-angle-right"></i> THÊM DANH MỤC SẢN PHẨM </h3>
      <div class="row mb" style="padding: 0.5rem">
     <!--  MODALS -->
     <div class="showback">
        <!-- Button trigger modal -->
        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
          THÊM DANH MỤC
          </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{route('danhmuc.store')}}"  enctype="multipart/form-data" method="post" class="form-horizontal style-form">
                    @csrf
                    <div class="form-group has-success">
                        <label class="col-lg-12 control-label" style="text-align:center; font-size:3rem"> THÊM DANH MỤC</label>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg-2 control-label"> Tên Danh Mục</label>
                      <div class="col-lg-10">
                        <input type="text" placeholder="" name="name" id="f-name" class="form-control">
                        {{-- <p class="help-block">Successfully done</p> --}}
                      </div>
                    </div>
                    <div class="form-group has-error">
                      <label class="col-lg-2 control-label">Hình Ảnh</label>
                      <div class="col-lg-10">
                          <input type="file" name="img"  onchange="previewImg(event)" parsley-trigger="change" required
                          class="form-control" id="img">
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="col-lg-2 control-label">Loại Danh Mục</label>
                      <div class="col-lg-10">
                        <div class="form-group">
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
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-lg-12 control-label" style="text-align:center; font-size:3rem">   SEO DANH MỤC</label>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-lg-2 control-label">Tiêu Đề Danh Mục</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="meta_desc" placeholder="Tiêu Đề Danh Mục"></textarea>
                        </div>
                    </div>
                      <div class="form-group has-error">
                        <label class="col-lg-2 control-label">Mô Tả Tiêu Đề Danh Mục</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="meta_title" placeholder="Mô Tả Tiêu Đề Danh Mục"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-10">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /showback -->
      </div>
    <h3><i class="fa fa-angle-right"></i> DANH SÁCH DANH MỤC SẢN PHẨM </h3>
    <div class="row mb" style="padding: 0.5rem">
      <!-- page start-->
      <div class="content-panel">
        <div class="adv-table" style="padding: 1.2rem">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th width="3%"> STT </th>
                <th width="18%">Tên Danh Mục</th>
                <th width="18%">slug</th>
                <th width="27%">Hình Ảnh</th>
                <th width="14%" class="hidden-phone">loại</th>
                <th width="20%" class="hidden-phone">Chức Năng</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr id="row{{$item->id}}">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->slug}}</td>
                        <td>
                        <div class="project-wrapper">
                            <div class="project">
                              <div class="photo-wrapper">
                                <div class="photo">
                            <a class="fancybox" href="{{ asset('uploads') }}/{{$item->img}}"><img class="img-responsive" src="{{ asset('uploads') }}/{{$item->img}}" height="auto" width="300px" alt="center"></a>
                            </div>
                            <div class="overlay"></div>
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="center hidden-phone">
                            @php
                            $array = [
                                         ['id'=>1,'name'=>"Dịch Vụ"],
                                         ['id'=>2,'name'=>"Sản Phẩm"],
                                         ['id'=>3,'name'=>"Bài Viết"],
                                         ['id'=>4,'name'=>"Thương Hiệu"]
                                     ];
                         @endphp
                             @foreach ($array as $loaiarray)
                             @if ($item->loai == $loaiarray['id'])
                                 {{$item['name']}}
                             @endif
                         @endforeach
                        <td>
                            <a role="button" class="btn btn-primary mr-2" href="{{route('danhmuc.edit',$item->slug)}}"><i class="fa fa-edit"></i></a>
                            @csrf
                            <button type="button" onclick="deleteCommon({{$item->id}})" class="btn btn-danger text-white " data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
                        </td>
                    </>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- page end-->
    </div>
    <!-- /row -->
  </section>
@endsection
