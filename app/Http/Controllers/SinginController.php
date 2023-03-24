<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SinginController extends Controller
{
    public function showSingin()
    {
        $cities = City::all();
        $countries = Country::all();
        return response()->view('cms.sign.sign', compact('cities', 'countries'));
    }

    public function signIn(Request $request)
    {
        $validator = Validator($request->all(), [
            'firstname' => 'required|min:2|max:40',
            'lastname' => 'required|min:2|max:40',
            'email' => 'required|email',
            'password' => 'required|min:6|max:100',
            'date' => 'date',
            'gender' => 'required',
            'status' => '',
            'mobile' => 'required|min:5|max:40',
            'city_id' => 'required|',
        ]);

        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isSaved = $admins->save();

            // كل عمود لحال

            if ($isSaved) {
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                }



                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->date = $request->get('date');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->mobile = $request->get('mobile');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($admins);
                $isSaved = $users->save();


                // return response()->json([
                //     'icon' => 'success',
                //     'title' => 'Created Is successFully'
                // ], 200);

                if ($isSaved) {
                    return response()->json([
                        'icon' => 'success',
                        'title' => 'Created Is successFully'
                    ], 200);
                } else {
                    return response()->json([
                        'icon' => 'error',
                        'title' => 'Created Is Failed'
                    ], 400);
                }
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }
}
