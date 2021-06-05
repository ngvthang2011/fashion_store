@extends('backend.master.master')
@section('title','Thuộc tính sản phẩm')
@section('product')
    class="active"
@endsection
	
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý thuộc tính</h1>

        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                   @if (session('alert'))
                        <div class="alert alert-success">
                            <strong>{{ session('alert') }}</strong>
                        </div>
                   @endif
                    @foreach ($attributes as $attr)
                        <div class="row magrin-attr">
                            <div class="col-md-2 panel-blue widget-left">
                                <strong class="large">{{ $attr->name }}</strong>
                                <a onclick="return delAttr('{{ $attr->name }}')" class="delete-attr" href="admin/product/del-attr/{{ $attr->id }}"><i class="fas fa-times"></i></a>
                                <a class="edit-attr" href="admin/product/edit-attr/{{ $attr->id }}"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-md-10 widget-right boxattr">
                            @foreach ($attr->values as $value)
                                    <div class="text-attr">{{ $value->value }}
                                        <a href="admin/product/edit-value/{{ $value->id }}" class="edit-value"><i class="fas fa-edit"></i></a>
                                        <a onclick="return delValue('{{ $attr->name }}','{{ $value->value }}')" href="admin/product/del-value/{{ $value->id }}" class="del-value"><i class="fas fa-times"></i></a>
                                    </div>      
                            @endforeach
                                    <div class="text-attr"><a href="admin/product/add" class="add-value"><i
                                        class="fas fa-plus-circle"></i></i></a></div>
                             </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>
<!--/.main-->

@endsection

@section('script')
    <script>
        function delAttr(attrName){
            return confirm('Bạn có chắc chắn xóa thuộc tính: '+attrName+' ?');
        }

        function delValue(attrName, value){
            return confirm('Bạn có chắc chắn xóa giá trị: '+value+' của thuộc tính '+attrName+' ?');
        }
    </script>
@endsection