<?php

namespace App\Http\Controllers\BackEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProductsController extends Controller
{
    private $backendPath = 'backend.';
    private $views = 'cateproduct.';

    public function add(){
    	return view($this->backendPath.$this->views.'add_category_products');
    }

    public function index(){
        $all_category_products = DB::table('tbl_category_products')->get(); 
        session()->put('message', '');
    	return view($this->backendPath.$this->views.'index')->with('data', compact('all_category_products'));
    }

    public function save(Request $request){
        $data = array();
        $data['category_name'] = $request->category_products_name;
        $data['category_description'] = $request->category_products_description;
        $data['category_status'] = $request->category_products_status;

        DB::table('tbl_category_products')->insert($data);
        session()->put('message', 'Thêm danh mục thành công');
        return view($this->backendPath.$this->views.'add_category_products');
    }

    public function active(Request $request){
        $data = $request->query();
        $id = $data['id'];
        $successMsg ='Kích hoạt danh mục sản phẩm thành công';
        $errorMsg = 'Kích hoạt danh mục sản phẩm không thành công';
        //
        if(!empty($id)) {
            $result = DB::table('tbl_category_products')->where('category_id', $id)->update(['category_status' => 'activated']);
            if($result == 1) {
                session()->put('message', $successMsg);
            } else {
                session()->put('message', $errorMsg);
            }
        } else {
            session()->put('message', $errorMsg);
        }
        $all_category_products = DB::table('tbl_category_products')->get();
        return view($this->backendPath.$this->views.'index')->with('data', compact('all_category_products'));
    }

    public function inactive(Request $request){
        $data = $request->query();
        $id = $data['id'];
        $successMsg ='Ngừng Kích hoạt danh mục sản phẩm thành công';
        $errorMsg = 'Ngừng kích hoạt danh mục sản phẩm không thành công';
        //
        if(!empty($id)) {
            $result = DB::table('tbl_category_products')->where('category_id', $id)->update(['category_status' => 'inactive']);
            if($result == 1) {
                session()->put('message', $successMsg);
            } else {
                session()->put('message', $errorMsg);
            }
        } else {
            session()->put('message', $errorMsg);
        }
        $all_category_products = DB::table('tbl_category_products')->get();
        return view($this->backendPath.$this->views.'index')->with('data', compact('all_category_products'));
    }

    public function edit(Request $request){
        $data = $request->query();
        $id = $data['id'];
        $updateCategoryProducts = DB::table('tbl_category_products')->where('category_id', $id)->get();

        return view($this->backendPath.$this->views.'update_category_products',['update_category_products'=>$updateCategoryProducts]);
    }

    public function update_category(Request $request){
        $data = array();
        $data['category_name'] = $request->category_products_name;
        $data['category_description'] = $request->category_products_description;
        // id
        $data_id = $request->query();
        $id = $data_id['id'];
        // 
        $successMsg = 'Cập nhật danh mục thành công';
        DB::table('tbl_category_products')->where('category_id', $id)->update($data);
        session()->put('message', 'Cập nhật danh mục sản phẩm thành công');
        return redirect()->route('ROUTE_ALL_CATEGORY_PRODUCTS_DASHBOARD_PAGE');
    }

    public function delete(Request $request){
        $data_id = $request->query();
        $id = $data_id['id'];
        DB::table('tbl_category_products')->where('category_id', $id)->delete();
        session()->put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect()->route('ROUTE_ALL_CATEGORY_PRODUCTS_DASHBOARD_PAGE'); 
    }
}
