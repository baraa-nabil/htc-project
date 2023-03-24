<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();admins
        $admins = Admin::orderBy('id', 'desc')->paginate(5);
        // return response()->view('cms.admin.index', compact('admins'));

        $this->authorize('viewAny', Admin::class);

        return response()->view('cms.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        $roles = Role::where('guard_name', 'admin')->get(); // المسميات الوظيفية الخاصة بالادمن

        $this->authorize('create', Admin::class);

        return response()->view('cms.admin.create', compact('cities', 'countries', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        $cities = City::all();
        $roles = Role::all();
        return response()->view('cms.admin.edit', compact('admins', 'cities', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'firstname' => 'required|min:2|max:40',
            'lastname' => 'required|min:2|max:40',
            'email' => 'required|email',
            'password' => 'nullable',
            'date' => 'date',
            'gender' => 'required',
            // 'status' => '',
            'mobile' => 'required|min:5|max:40',
            // 'city_id' => 'required|',
        ]);

        if (!$validator->fails()) {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            // $admins->password = $request->get('password');

            $isUpdat = $admins->save();

            if ($isUpdat) {
                $users = $admins->user;

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

                $isUpdat = $users->save();

                return ['redirect' => route('admins.index')];
            }
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::destroy($id);
    }
}
