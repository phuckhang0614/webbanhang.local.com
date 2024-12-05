<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin(){
    	return view('backend.admin_login');
    }
    public function show_dashboard(){
    	return view('backend.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

    	if(!empty($result)){
    		session()->put('admin_name', $result->admin_name);
    		session()->put('admin_id', $result->admin_id);
    		return Redirect::to('/dashboard.html');
    	} else{
    		session()->put('message', 'Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại');
    		// $message = session()->get('message');
    		// dd($message);
    		return view('backend.admin_login');
    	}	
    }
    public function logout(){
    	session()->put('admin_name', null);
    	session()->put('admin_id', null);
    	return Redirect::to('/admin.html');
    }

}
