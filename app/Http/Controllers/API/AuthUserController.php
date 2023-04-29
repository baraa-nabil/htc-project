<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator($request->all(), [
            // 'email' => 'required|email|unique:admin,email',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // ....
        ]);
        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isSave = $admins->save();
            if ($isSave) {
                return response()->json([
                    'status' => true,
                    'message' => 'created account is successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Created account was failed'
                ]);
            }

            // user as always
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            // 'email' => 'required|email|exists:admin,email',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // ....
        ]);
        if (!$validator->fails()) {
            $admins = Admin::where('email', '=', $request->get('email'))->first();

            if (Hash::check($request->get('password'), $admins->password)) {
                $token = $admins->createToken('admin-api');
                $admins->setAttribute('token', $token->accessToken);
                return $token;

                return response()->json([
                    'status' => true,
                    'message' => 'Login is successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Login is Failed'
                ], 400);
            }
            // $admins = Admin::Where('password', $request->get('email'))->first();
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first()
            ], 200);
        }
    }
    public function logout(Request $request)
    {
        $token = $request->user('admin_api')->token();
        $revoked = $token->revoke();

        return response()->json([
            'status' => true,
            'message' => 'Log out is successfully'
        ], 200);
    }
    public function forgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:admins,email',
            // oh yes
            // 'email' => 'required|email',
            // ....
        ]);
        if (!$validator->fails()) {
            $admins = Admin::where('email', '=', $request->get('email'))->first();
            $authCode = random_int(1000, 9999);
            $admins->authCode = Hash::make($authCode);

            $isSaved = $admins->save();

            return response()->json([
                'status' => $isSaved ? true : false,
                'message' => $isSaved ? 'Generated Code Is Successfully' : 'Generated Code Is Failed',
                'code' => $authCode
            ], $isSaved ? 200 : 400);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator($request->all(), [

            'email' => 'required|email|exists:admins,email',
            'authCode' => 'required|digits:4',
            'password' => 'required|string|min:6|confirmed',
        ], [
            //
        ]);

        if (!$validator->fails()) {
            $admins = Admin::where('email', '=', $request->get('email'))->first();
            if (Hash::check($request->get('authCode'), $admins->authCode)) {
                $admins->password = Hash::make($request->get('password'));
                $admins->authCode = null;

                $isSaved = $admins->save();
                return response()->json([
                    'status' => $isSaved ? true : false,
                    'message' => $isSaved ? 'Update password is successfully' : 'Update password is failed'
                ], $isSaved ? 200 : 400);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Update password is failed'
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first()
            ], 400);
        }
    }
}
