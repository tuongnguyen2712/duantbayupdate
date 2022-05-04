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
    .tab {
    /* display: none; */
    }
    textarea{
        width: 100%;
    }
    .modal-dialog{
        width: 58em;
    }
    .modal-content{
        padding: 1em;
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
    td.text-size{
        display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
    }
    td.text-size {
    width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 5;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    }

</style>
<section class="wrapper" >
      <h3><i class="fa fa-angle-right"></i> THÊM SẢN PHẨM </h3>
      <div class="row mb" style="padding: 0.5rem">
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="{{route("sanpham.create")}}">Thêm Sản Phẩm</a>
          </div>
     <!--  MODALS -->


      </div>
      <!-- /showback -->
      </div>
    <h3><i class="fa fa-angle-right"></i> DANH SÁCH SẢN PHẨM </h3>
    <div class="row mb" style="padding: 0.5rem">
      <!-- page start-->
      <div class="content-panel">
        <div class="adv-table" style="padding: 1.2rem">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
              <tr>
                <th width="3%"> STT </th>
                <th width="19%">Tên Sản Phẩm</th>
                <th width="19%">Hình Ảnh</th>
                <th width="19%">Đơn Giá</th>
                <th width="19%" class="hidden-phone">mô tả</th>
                <th width="2%" class="hidden-phone">Trạng Thái</th>
                <th width="19%" class="hidden-phone">Chức Năng</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr id="row{{$item->id}}">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <div class="project-wrapper">
                                <div class="project">
                                  <div class="photo-wrapper">
                                    <div class="photo">
                                <a class="fancybox" href="{{ asset('uploads') }}/{{ json_decode($item->img)[0] }}"><img class="img-responsive" src="{{ asset('uploads') }}/{{ json_decode($item->img)[0] }}" height="auto" width="200em" alt="center"></a>
                                </div>
                                <div class="overlay"></div>
                                </div>
                                </div>
                            </div>
                        </td>
                        <td>{{number_format($item->dongia)}} VNĐ</td>
                        <td class="text-size" style="line-height: 4rem;">{{$item->mota}}</td>
                        <td>
                            @if ($item->trangthai == 1)
                                <a href="active-product/{{$item->id}}" class="btn btn-success mr-2" title="hiện"><i class="fa fa-eye"></i></a>

                            @else
                                <a href="unactive-product/{{$item->id}}" class="btn btn-danger mr-2" title="ẩn"><i class="fa fa-eye"></i></a>

                            @endif

                        </td>
                        <td>
                            <a role="button" class="btn btn-primary mr-2" href="{{route('sanpham.show',$item->slug)}}" title="xem xản phẩm chi tiết admin"><i class="fa fa-eye"></i></a>
                            <a role="button" class="btn btn-primary mr-2" href="{{route('sanpham.edit',$item->slug)}}"  title="sửa"><i class="fa fa-edit"></i></a>
                            @csrf
                            <button type="button" onclick="deleteCommon({{$item->id}})" class="btn btn-danger text-white " data-bs-toggle="tooltip" data-bs-placement="right" title="Xóa"><i class="fa fa-trash"></i></button>
                            <a role="button" class="btn btn-primary mr-2" href="/san-pham/{{$item->slug}}" title="xem sản phẩm chi tiết người dùng"><i class="fa fa-eye"></i></a>
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
