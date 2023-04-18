<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.slider.create'); // طريقة جديدة
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
            'title' => 'string|max:50',
            'short_description' => 'string|max:2500',
        ], []);
        if (!$validator->fails()) {
            $sliders = new Slider();
            $sliders->title = $request->get('title');
            $sliders->short_description = $request->get('short_description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image' . $image->getClientOriginalExtension();

                $image->move('storage/images/slider', $imageName);

                $sliders->image = $imageName;
            }

            $isSaved = $sliders->save();

            return response()->json([
                'icon' => 'success',
                'title' => 'Created is Successfully',
            ]);
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
        $sliders = Slider::findOrFail($id);
        return view('cms.slider.show', compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('cms.slider.edit', compact('sliders'));
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
            'title' => 'string|max:50',
            'short_description' => 'string|max:2500',
        ], []);
        if (!$validator->fails()) {
            $sliders = Slider::findOrFail($id);
            $sliders->title = $request->get('title');
            $sliders->short_description = $request->get('short_description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image' . $image->getClientOriginalExtension();

                $image->move('storage/images/slider', $imageName);

                $sliders->image = $imageName;
            }

            $isSaved = $sliders->save();


            return ['redirect' => route('sliders.index')];
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
        $sliders = Slider::destroy($id);
    }
}
