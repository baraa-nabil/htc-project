<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller Develop
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->orderBy('id', 'desc')->paginate(100);
        return response()->view('cms.spaity.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.spaity.role.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), []);
        if (!$validator->fails()) {
            $roles = new Role();
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isSaved = $roles->save();

            return response()->json([
                'icon' => 'success',
                'title' => 'Created is Successfully'
            ], 200);
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
        $roles = Role::finOrFail($id);

        return response()->view('cms.spaity.role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { {
            $validator = Validator($request->all(), []);
            if (!$validator->fails()) {
                $roles = Role::findOrFail($id);
                $roles->name = $request->get('name');
                $roles->guard_name = $request->get('guard_name');

                $isUpdated = $roles->save();

                // return response()->json([
                //     'icon' => 'success',
                //     'title' => 'Created is Successfully'
                // ], 200);
                return ['redirect' => route('roles.index')];
            } else {
                return response()->json([
                    'icon' => 'error',
                    'title' => $validator->getMessageBag()->first(),
                ], 400);
            }
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
        $roles = Role::destroy($id);
    }
}