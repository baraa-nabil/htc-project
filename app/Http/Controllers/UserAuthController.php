<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Display the login interface
    // get
    public function showLogin($guard)
    {
        return response()->view('cms.auth.login', compact('guard'));
    }

    // Responsible for the login process
    // post
    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ], []);

        // اسم متفق عليه
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (!$validator->fails()) {

            if (Auth::guard($request->get('guard'))->attempt($credentials)) {
                return response()->json([
                    'icon' => 'success',
                    'title' => 'Log in is successfully'
                ], 200);
            } else {
                return response()->json([
                    'icon' => 'error',
                    'title' => 'Log in is Failed',
                ], 400);
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    //get
    // لانه لما يفذ عمليه تسجيل الخروج راح يوجهه الى دالة تسجيل الدخول الرئيسية

    public function logout(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'author';

        Auth::guard($guard)->logout();

        $request->session()->invalidate();

        return redirect()->route('view.login', $guard);
    }

    //Display the password change interface
    public function changePassword()
    {
    }


    //حبعتله ريكوست بكلمة المرور القديمة وكلمة المرور الجديدة

    public function resetPassword(Request $request)
    {
    }

    // حنلغي التعديل في واجهة الادمن والكاتب الي عملناهم في مرحلة التدريب لانه اي حد ممكن يوصل لالها
    public function editProfile()
    {
    }

    public function updateProfile(Request $request, $id)
    {
    }
}
