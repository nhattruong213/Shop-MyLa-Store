<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use session;
class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('Login')){
            return redirect()->route('PageAdmin'); 
        } else{
            return view('dashboard.login');
        }
    }
    public function ShowDashBoard(Request $request){
        if($request->session()->has('Login')){
            return view('dashboard.index'); 
        } else{
            return view('dashboard.login');
        }
    }
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $result = Admin::where('email', $email)->where('password', $password)->first();
        if($result!=null) {
            $request->session()->put('Login', $result);
           return redirect()->route('PageAdmin');
        }else{
            return redirect()->back()->with('error', 'Email hoặc password không đúng.');
        }
    }
    public function logout(Request $request){
        $request->session()->forget('Login');
        return redirect()->route('ShowLogin');
    }
}
