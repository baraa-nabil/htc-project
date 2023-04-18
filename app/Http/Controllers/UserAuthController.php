<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (auth('admin')->check()) {
            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            return redirect()->route('view.login', 'admin');
        } else {
            Auth::guard('author')->logout();

            $request->session()->invalidate();

            return redirect()->route('view.login', 'author');
        }

        // $guard = auth('admin')->check() ? 'admin' : 'auhtor';

        // Auth::guard($guard)->logout();

        // $request->session()->invalidate();

        // return redirect()->route('view.login', $guard);
    }

    //Display the password change interface
    // public function editPassword(){
    //     return response()->view('dashboard.auth.edit-password');
    // }


    //حبعتله ريكوست بكلمة المرور القديمة وكلمة المرور الجديدة

    // public function updatePassword(Request $request){
    //     $guard = auth('admin')->check() ? 'admin' : 'web';
    //     $validator = Validator($request->all(),[

    //         'current_password' => 'required|string',
    //         'new_password' => 'required|string|confirmed',
    //         'new_password_confirmation' => 'required|string'
    //     ]);
    //     if(!$validator->fails()){
    //         $user = auth($guard)->user();
    //         $user->password = Hash::make($request->get('new_password'));
    //         $isSaved = $user->save();
    //         return ['redirect' =>route('admins.index')];

    //         if($isSaved){
    //         return response()->json(['icon' => 'success' , 'title'=> 'تم تغيير كلمة المرور بنجاح'], 200 );


    //      } else {
    //         return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تغيير كلمة المرور'] , 400);
    //     }
    // }
    //     else {
    //         return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
    //     }
    // }

    // حنلغي التعديل في واجهة الادمن والكاتب الي عملناهم في مرحلة التدريب لانه اي حد ممكن يوصل لالها

    public function editProfile(Request $request)
    {

        $admins = Admin::findOrFail(Auth::guard('admin')->id());
        $cities = City::all();
        return response()->view('cms.auth.edit-profile', compact('admins', 'cities'));
    }

    public function updateProfile(Request $request)
    {
    }
}