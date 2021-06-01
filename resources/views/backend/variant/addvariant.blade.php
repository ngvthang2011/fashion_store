@extends('backend.master.master')
@section('title','Thêm thuộc tính sản phẩm')
    
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Biến thể</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Biến thể</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading" align='center'>
                Giá cho từng biến thể sản phẩm : Áo khoác nam đẹp (AN01)
            </div>
            <div class="panel-body" align='center'>
                <table class="panel-body">
                    <thead>
                        <tr>
                            <th width='33%'>Biến thể</th>
                            <th width='33%'>Giá (có thể trống)</th>
                            <th width='33%'>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                size : M,
                                Màu sắc : đen,
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="" class="form-control" placeholder="Giá cho biến thể" value="">
                                </div>
                            </td>
                            <td>
                                <a id="" class="btn btn-warning" href="admin/product/delete-variant/1"
                                    role="button">Xoá</a>

                            </td>

                        </tr>
                        <tr>
                            <td scope="row">
                                size : L,
                                Màu sắc : đen,
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="" class="form-control" placeholder="Giá cho biến thể" value="">
                                </div>
                            </td>
                            <td>
                                <a id="" class="btn btn-warning" href="admin/product/delete-variant/2"
                                    role="button">Xoá</a>

                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>
            <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a
                    class="btn btn-warning" href="admin/product" role="button">Bỏ qua</a></div>

        </div>
    </div>

</div>
<!--/.main-->

@endsection