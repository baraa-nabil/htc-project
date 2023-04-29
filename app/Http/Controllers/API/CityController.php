<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // عرض البيانات
    public function index()
    {
        $cities = City::all();
        // $cities = City::select('name', 'street')->get(); use model
        // $cities = City::select('name', 'street')->get();
        $cities = City::where('country_id', '1')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Of Cities',
            'date' => $cities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // no create becaus the api don't work with views
    // no edit becaus the api don't work with views
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|min:3|max:20',
            'street' => 'required|min:3|max:20',
        ]);

        if (!$validator->fails()) {
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->street = $request->input('street');
            $cities->country_id = $request->input('country_id');

            $isSaved = $cities->save();

            return response()->json([
                'status' => true,
                'message' => 'Created is successfully'

            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => $validator->getMessageBag()->first(),
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
        $cities = City::findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Data Of Cities',
            'date' => $cities,
        ]);
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
            'name' => 'required|min:3|max:20',
            'street' => 'required|min:3|max:20',
        ], []);
        if (!$validator->fails()) {
            $cities = City::findOrFail($id);
            $cities->name = $request->get('name');
            $cities->street = $request->input('street');
            $cities->country_id = $request->input('country_id');

            $isUpdate = $cities->save();
            return response()->json([
                'status' => true,
                'message' => 'Updated is successfully'

            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => $validator->getMessageBag()->first(),
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
        $cities = City::destroy($id);
        return response()->json([
            'status' => true,
            'message' => 'Deleted is successfully'
        ]);
    }
}
