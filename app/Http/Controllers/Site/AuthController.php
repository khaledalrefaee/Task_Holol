<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_post(RegisterRequest $request){
       $user = User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),
       ]);
       return redirect()->route('login');
    }

    public function login(){
        return view('auth.login');

    }
    public function login_post (Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
                // تسجيل الدخول الناجح للمشرفين والموظفين
                return redirect()->route('home');
            }

            else {
            // رسالة الخطأ عندما يكون البريد الإلكتروني أو كلمة المرور غير صحيحة
            return redirect()->back()->withErrors([
                'email' => 'There is an error in the email or password.',
            ]);
        }
    }




    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
