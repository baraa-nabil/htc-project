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
        if (auth('admin')->check()) {
            Auth::guard('admin')->logout();

            $request->session()->invalidate();

            return redirect()->route('view.login', 'admin');
        }else {
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
    public function editPassword(){
        return response()->view('dashboard.auth.edit-password');
    }


    //حبعتله ريكوست بكلمة المرور القديمة وكلمة المرور الجديدة

    public function updatePassword(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'web';
        $validator = Validator($request->all(),[

            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);
        if(!$validator->fails()){
            $user = auth($guard)->user();
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();
            return ['redirect' =>route('admins.index')];

            if($isSaved){
            return response()->json(['icon' => 'success' , 'title'=> 'تم تغيير كلمة المرور بنجاح'], 200 );


         } else {
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تغيير كلمة المرور'] , 400);
        }
    }
        else {
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    // حنلغي التعديل في واجهة الادمن والكاتب الي عملناهم في مرحلة التدريب لانه اي حد ممكن يوصل لالها
    public function editProfile(Request $request){

        $admins = Admin::findOrFail(Auth::guard('admin')->id());
        $cities = City::all();
        return response()->view('dashboard.auth.edit-profile' , compact('admins' , 'cities') );
    }

    public function updateProfile(Request $request){
        $validator = Validator($request->all(), [

        ]);

        if (!$validator->fails()) {

            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            $admins->email = $request->email;
            if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('images/admin', $imageName);

            $admins->image = $imageName;

            }

            if (request()->hasFile('cv')) {

            $cv = $request->file('cv');

            $fileName = time() . 'cv.' . $cv->getClientOriginalExtension();

            $cv->move('storage/files/admin', $fileName);

            $admins->cv = $fileName;
            }


            $isSaved = $admins->save();
            if($isSaved){
                $users = $admins->user;
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->salary_type = $request->get('salary_type');
                $users->salary_value = $request->get('salary_value');
                $users->speciality = $request->get('speciality');
                $users->job_title = $request->get('job_title');
                $users->certification = $request->get('certification');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($admins);

                $isSaved = $users->save();
                return ['redirect' =>route('admins.index')];

                return response()->json(['icon' => ' success' , 'title' => 'تم تعديل المشرف بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشل تعديل المشرف'] , 400);
            }
        }
            else{
                return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
            }
    }
}
