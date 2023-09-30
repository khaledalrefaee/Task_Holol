<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Repository\CategoriesRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{



    public function login()
    {
        return view('backend.auth.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            return redirect()->route('admin.dashboard');
        } else {
            // فشل تسجيل الدخول
            return redirect()->back()->withErrors([
                'error' => 'There is an error in the email or password.',
            ]);
        }

    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('home');
    }

    private function getGaurd()
    {
        return auth('admin');
    }

}
