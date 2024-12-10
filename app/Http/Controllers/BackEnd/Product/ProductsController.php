<?php

namespace App\Http\Controllers\BackEnd\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    private $backendPath = 'backend.';
    private $views = 'product.';

    public function add_products(){
    	return view($this->backendPath.$this->views.'add_products');
    }

    public function index_products(){
        $all_products_products = DB::table('tbl_products')->get(); 
        session()->put('message', '');
    	return view($this->backendPath.$this->views.'index_products')->with('data', compact('all_products'));
    }

    public function save_products(Request $request){
        $data = array();
        $data['products_name'] = $request->products_products_name;
        $data['products_description'] = $request->products_products_description;
        $data['products_status'] = $request->products_products_status;

        DB::table('tbl_products')->insert($data);
        session()->put('message', 'Thêm danh mục thành công');
        return view($this->backendPath.$this->views.'add_products');
    }

    // public function active_products(Request $request){
    //     $data = $request->query();
    //     $id = $data['id'];
    //     $successMsg ='Kích hoạt danh mục sản phẩm thành công';
    //     $errorMsg = 'Kích hoạt danh mục sản phẩm không thành công';
    //     //
    //     if(!empty($id)) {
    //         $result = DB::table('tbl_products')->where('products_id', $id)->update(['products_status' => 'activated']);
    //         if($result == 1) {
    //             session()->put('message', $successMsg);
    //         } else {
    //             session()->put('message', $errorMsg);
    //         }
    //     } else {
    //         session()->put('message', $errorMsg);
    //     }
    //     $all_products_products = DB::table('tbl_products')->get();
    //     return view($this->backendPath.$this->views.'index_products')->with('data', compact('all_products'));
    // }

    // public function inactive_products(Request $request){
    //     $data = $request->query();
    //     $id = $data['id'];
    //     $successMsg ='Ngừng Kích hoạt danh mục sản phẩm thành công';
    //     $errorMsg = 'Ngừng kích hoạt danh mục sản phẩm không thành công';
    //     //
    //     if(!empty($id)) {
    //         $result = DB::table('tbl_products')->where('products_id', $id)->update(['products_status' => 'inactive']);
    //         if($result == 1) {
    //             session()->put('message', $successMsg);
    //         } else {
    //             session()->put('message', $errorMsg);
    //         }
    //     } else {
    //         session()->put('message', $errorMsg);
    //     }
    //     $all_products_products = DB::table('tbl_products')->get();
    //     return view($this->backendPath.$this->views.'index_products')->with('data', compact('all_products'));
    // }

    // public function edit_products(Request $request){
    //     $data = $request->query();
    //     $id = $data['id'];
    //     $updateproductsProducts = DB::table('tbl_products')->where('products_id', $id)->get();

    //     return view($this->backendPath.$this->views.'update_products',['update_products'=>$updateproductsProducts]);
    // }

    // public function update_products(Request $request){
    //     $data = array();
    //     $data['products_name'] = $request->products_products_name;
    //     $data['products_description'] = $request->products_products_description;
    //     // id
    //     $data_id = $request->query();
    //     $id = $data_id['id'];
    //     // 
    //     $successMsg = 'Cập nhật thương hiệu thành công';
    //     DB::table('tbl_products')->where('products_id', $id)->update($data);
    //     session()->put('message', 'Cập nhật thương hiệu sản phẩm thành công');
    //     return redirect()->route('ROUTE_ALL_PRODUCTS');
    // }

    // public function delete_products(Request $request){
    //     $data_id = $request->query();
    //     $id = $data_id['id'];
    //     DB::table('tbl_products')->where('products_id', $id)->delete();
    //     session()->put('message', 'Xóa danh mục sản phẩm thành công');
    //     return redirect()->route('ROUTE_ALL_PRODUCTS'); 
    // }
}
