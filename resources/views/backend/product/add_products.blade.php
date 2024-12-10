@extends('backend.admin_layout')
@section('admin_content')
 		<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                        	<?php
								$message = session()->get('message');
								if(!empty($message)) {
									echo '<span class="text-alert">' .$message. '</span>';
									$message = session()->pull('message');
								}
							?>
                            <div class="position-center">
                                <form role="form" action="{{ route('ROUTE_SAVE_PRODUCTS') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Input_Products_Name">Tên sản phẩm</label>
                                    <input type="text" name="products_name" class="form-control" id="Input_Products_Name" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="Input_Products_Name">Giá sản phẩm</label>
                                    <input type="text" name="products_price" class="form-control" id="Input_Products_Name" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="Input_Products_Name">Hình ảnh sản phẩm</label>
                                    <input type="file" name="products_image" class="form-control" id="Input_Products_Image">
                                </div>
                                <div class="form-group">
                                    <label  for="Input_Products_Description">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="2" name="products_description" class="form-control" id="Input_Products_Description" placeholder="Mô tả thương hiệu"></textarea>
                                </div>
                                <div class="form-group">
                                    <label  for="Input_Products_Content">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name="products_content" class="form-control" id="Input_Products_Description" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Select_Products_Options_Display">Danh mục</label>
                                        <select name="brand_products_status" class="form-control input-sm m-bot15">
                                            <option value="0" >PC</option>
                                            <option value="1" >Laptop</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="Select_Products_Options_Display">Thương hiệu</label>
                                        <select name="brand_products_status" class="form-control input-sm m-bot15">
                                            <option value="0" >Dell</option>
                                            <option value="1" >Hp</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                	<label for="Select_Products_Options_Display">Hiển thị</label>
	                                    <select name="brand_products_status" class="form-control input-sm m-bot15">
			                                <option value="0" >Ẩn</option>
			                                <option value="1" >Hiển thị</option>
			                            </select>
                                </div>
                                <button type="submit" name="add_category_products" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
@endsection