@extends('backend.admin_layout')
@section('admin_content')
 		<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{ route('ROUTE_SAVE_CATEGORY_PRODUCTS_DASHBOARD_PAGE') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Input_Products_Name">Tên danh mục</label>
                                    <input type="text" name="category_products_name" class="form-control" id="Input_Products_Name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label  for="Input_Products_Description">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name="category_products_description" class="form-control" id="Input_Products_Description" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                	<label for="Select_Products_Options_Display">Hiển thị</label>
	                                    <select name="category_products_status" class="form-control input-sm m-bot15">
			                                <option value="0" >Ẩn</option>
			                                <option value="1" >Hiển thị</option>
			                            </select>
                                </div>
                                <button type="submit" name="add_category_products" class="btn btn-info">Thêm Danh Mục</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
@endsection