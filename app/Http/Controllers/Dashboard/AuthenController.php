<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenController extends Controller
{
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function getLogin()
    {
        dd('11');
        return view('dashboard.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    // public function postLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
    //     {
    //         $user = auth()->guard('admin')->user();
            
    //         return redirect()->route('admin.dashboard');
            
    //     } else {
    //         return back()->with('error','your username and password are wrong.');
    //     }
    // }

    // /**
    //  * Show the application logout.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function logout(Request $request)
    // {
    //     Auth::guard('admin')->logout();

    //     // $request->session()->invalidate();

    //     // $request->session()->regenerateToken();

    // }
}
