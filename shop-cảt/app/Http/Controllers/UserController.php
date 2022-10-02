<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller{
    public function show(){
        return view('auth.add');
    }

    public function store(Request $request){
        if ($request->isMethod('post')) {
            // get all data in input field
            $varlidator = Validator::make($request->all(), [
                // 'name'      =>  'required|min:6|max:30|alpha',
                // 'email'     =>  'required|email',
                // 'avatar'    =>  'required|image|mimes:jgp,png,jpeg|max:10000',
                // 'phone'     =>  'required|min:10|numeric',
                // 'password'  =>  'required|confirmed|min:6|max:16',
            ]);
            if ($varlidator->fails()) {
                return  redirect()->back()
                    ->withErrors($varlidator)
                    ->withInput();
            }

            // if ($request->hasFile('avatar')) {
            //     $file = $request->file('avatar');
            //     $des_path = public_path('public/image/avatar');
            //     $file_name = time().'_'.$file->getClientOriginalName();
            //     $file->move($des_path, $file_name);
            // } else {
            //     $file_Name = 'no_name.png';
            // }



            $name          =  $request->input('name');
            $email         =  $request->input('email');

            if ($request->hasFile('avatar')) {
                $randomize = rand(111111, 999999);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $filename = $randomize . '.' . $extension;
                $avatar = $request->file('avatar')->move('./image/avatar/', $filename);
            }

            $phone         =  $request->input('phone');
            $password      =  bcrypt($request->input('password'));
            // $password      =  $request->input('password');
            $role          =  $request->input('role');
            $status        =  $request->input('status');

            if (User::where('email', '=', $email)->exists()) {
                return  redirect()->route('auth.show')->with('message', 'tai khoan da ton tai');
             }

            $data = array('name'=>$name,"email"=>$email,"avatar"=>$avatar,"phone"=>$phone,"password"=>$password,"role"=>$role,"status"=>$status);
            $user = DB::table('users')->insert($data);

            return redirect()->route('auth.showLogin')->with('message', 'tao tai khoan thanh cong ');
            }
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){

        if ($request->isMethod('post')){
            $varlidator = Validator::make($request->all(), [
                // 'email'     =>  'required|email',
                // 'password'  =>  'required|confirmed',
            ]);
            if ($varlidator->fails()) {
                return  redirect()->back()
                    ->withErrors($varlidator)
                    ->withInput();
            }
            $email         =  $request->input('name');
            $password      =  $request->input('password');
            $remember      =  $request->input('remember');

            if(Auth::attempt(['email' => $email, 'password' =>$password])){
                // if(Auth::user()->status!=1){
                //     return redirect()->route('auth.show')->with('message',"tai khoan da bi khoa");
                // }
                // if(Auth::user()->role==1){
                //     // return view('auth.home');
                //     return array("email"=>$email,"password"=>$password,"remember"=>$remember);
                // }
                // else{
                //     return view('auth.admin');
                // }
                return redirect()->route('auth.showHome')->with('message',"dang nhap thanh cong");
            }
            // else return redirect()->route('auth.showLogin')->with('message',"dang nhap that bai");

            return redirect()->route('auth.showHome')->with('message',"dang nhap thanh cong");
        }

    }

    // /**
    //  * Handle an authentication attempt.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');

    public function showHome(){
        return view('auth.home');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('auth.showLogin');
    }


}


