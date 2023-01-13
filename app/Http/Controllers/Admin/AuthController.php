<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//
//class AuthController extends Controller
//{
//
//    public function index(){
//
//        return view('auth.login');
//    }
//
//    public function login(Request $request){
//
//        $data = $request->validate([
//
//            "email" => ['required', 'email', 'string'],
//            "password" => ['required']
//        ]);
//
//        if (auth("admin")->attempt($data)){
//            return redirect(route('admin.home'));
//        }
//
//        return redirect(route('admin.login'))->withErrors(['email' => 'Email is not valid or not registered.']);
//    }
//
//    public function logout(){
//        auth('admin')->logout();
//
//        return redirect(route('admin.login'));
//    }
//
//}
