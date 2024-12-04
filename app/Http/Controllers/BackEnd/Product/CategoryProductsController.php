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
    	return view($this->backendPath.'add_category_products');
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
        return view('backend.add_category_products');
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

    public function update(Request $request){
        $data = $request->query();
        $id = $data['id'];
        $update_category_products = DB::table('tbl_category_products')->where('category_id', $id)->get(); 
        $manager_category_products = view($this->backendPath.$this->views.'update_category_products')->with('update_category_products', $update_category_products);
        return view($this->backendPath.'admin_layout')->with($this->backendPath.$this->views.'update_category_products', $manager_category_products);
    }
}
