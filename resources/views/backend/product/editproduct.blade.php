@extends('backend.master.master')
@section('title', 'Sửa sản phẩm')
    
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="panel-heading">Sửa sản phẩm Áo khoác nam đẹp (AN01)</div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category" class="form-control">
                                            <option value='1'>Nam</option>
                                            <option value='3' selected>---|Áo khoác nam</option>
                                            <option value='2'>Nữ</option>
                                            <option value='4'>---|Áo khoác nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" name="product_code" class="form-control"
                                            value="AN01">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="product_name" class="form-control"
                                            value="Áo khoác nam đẹp">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm (Giá chung)</label> <a
                                            href="admin/product/edit-variant/1"><span
                                                class="glyphicon glyphicon-chevron-right"></span>
                                            Giá theo biến thể</a>
                                        <input type="number" name="product_price" class="form-control"
                                            value="150000">
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="product_state" class="form-control">
                                            <option selected value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file" name="product_img" class="form-control hidden"
                                            onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="350px"
                                            src="public/backend/img/ao-khoac.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thông tin</label>
                                <textarea name="info" style="width: 100%;height: 100px;">thông tin</textarea>
                            </div>


                        </div>
                        <div class="col-xs-4">

                            <div class="panel panel-default">
                                <div class="panel-body tabs">
                                    <label>Các thuộc Tính</label>
                                    <ul class="nav nav-tabs">
                                        <li class='active'><a href="#tab17" data-toggle="tab">size</a></li>
                                        <li><a href="#tab18" data-toggle="tab">Màu sắc</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade  active  in" id="tab17">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[17][60]" value="60"> </td>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[17][61]" value="61" checked> </td>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[17][64]" value="64" checked> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>

                                        <div class="tab-pane fade  in" id="tab18">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Đỏ</th>
                                                        <th>đen</th>
                                                        <th>xám</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[18][62]" value="62"> </td>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[18][63]" value="63" checked> </td>
                                                        <td> <input class="form-check-input" type="checkbox"
                                                                name="attr[18][65]" value="65"> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <p></p>

                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description"
                                            style="width: 100%;height: 100px;"></textarea>

                                    </div>


                                    <button class="btn btn-success" name="add-product" type="submit">Sửa sản
                                        phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="clearfix"></div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--/.row-->

</div>
<!--end main-->
@endsection

@section('script')
<script>
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $('#avatar').click(function () {
            $('#img').click();
        });
    });

</script>
@endsection
