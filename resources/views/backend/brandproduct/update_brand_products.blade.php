@extends('backend.admin_layout')
@section('admin_content')
 		<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        @php
                          $message = session()->get('message');
                          //
                          if(!empty($message)) {
                            echo '<div><span class="text-alert">' .$message. '</span><div>';
                            $message = session()->pull('message');
                          }
                        @endphp
                        <div class="panel-body">
                        @foreach($update_brand_products as $key => $update_value)
                            <div class="position-center">
                                <form role="form" action="{{ route('ROUTE_UPDATE_BRAND_PRODUCTS',['id' => $update_value->brand_id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Input_Products_Name">Tên thương hiệu</label>
                                    <input type="text" value="{{$update_value->brand_name}}" name="brand_products_name" class="form-control" id="Input_Products_Name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label  for="Input_Products_Description">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="5" name="brand_products_description" class="form-control" id="Input_Products_Description">{{$update_value->brand_description}}</textarea>
                                </div>
                                <button type="submit" name="add_brand_products" class="btn btn-info">Cập nhật thương hiệu sản phẩm</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>
            </div>
        </div>
@endsection