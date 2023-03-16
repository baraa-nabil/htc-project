<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        $authors = Author::withCount('articles')->orderBy('id', 'desc')->paginate(5);
        // return response()->view('cms.admin.index', compact('authors$authors'));
        return response()->view('cms.author.index', compact('authors'));
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

        return response()->view('cms.author.create', compact('cities', 'countries'));
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
            $authors = new Author();
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));

            $isSaved = $authors->save();

            // كل عمود لحال

            if ($isSaved) {
                $users = new User();
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image' . $image->getClientOriginalExtension();

                    $image->move('storage/images/author', $imageName);

                    $users->image = $imageName;
                }



                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->date = $request->get('date');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->mobile = $request->get('mobile');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($authors);
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
        $authors = Author::findOrFail($id);
        $cities = City::all();

        return response()->view('cms.author.edit', compact('authors', 'cities'));
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
            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');
            // $authors->password = $request->get('password');

            $isUpdat = $authors->save();

            if ($isUpdat) {
                $users = $authors->user;

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image' . $image->getClientOriginalExtension();

                    $image->move('storage/images/author', $imageName);

                    $users->image = $imageName;
                }

                $users->firstname = $request->get('firstname');
                $users->lastname = $request->get('lastname');
                $users->date = $request->get('date');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->mobile = $request->get('mobile');
                $users->city_id = $request->get('city_id');
                $users->actor()->associate($authors);

                $isUpdat = $users->save();

                return ['redirect' => route('authors.index')];
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
        $authors = Author::destroy($id);
    }
}
