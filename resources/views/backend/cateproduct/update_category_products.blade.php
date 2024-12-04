@extends('backend.admin_layout')
@section('admin_content')
 		<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <?php
                            $message = session()->get('message');
                            if(!empty($message)) {
                                echo '<span class="text-alert">' .$message. '</span>';
                                $message = session()->pull('message');
                                }
                            ?>
                        <div class="panel-body">
                        @foreach($update_category_products as $key => $update_value)
                            <div class="position-center">
                                <form role="form" action="{{ route('ROUTE_UPDATE_PRODUCTS',['category_products_id' => $update_value->category_id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Input_Products_Name">Tên danh mục</label>
                                    <input type="text" value="{{$update_value->category_name}}" name="category_products_name" class="form-control" id="Input_Products_Name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label  for="Input_Products_Description">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name="category_products_description" class="form-control" id="Input_Products_Description">{{$update_value->category_description}}</textarea>
                                </div>
                                <button type="submit" name="add_category_products" class="btn btn-info">Cập nhật danh mục sản phẩm</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>
            </div>
        </div>
@endsection