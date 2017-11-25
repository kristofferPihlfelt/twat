<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        /*$user = $request->all();*/

        $user = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role_id' => $request->get('role_id'),
            'is_active' => $request->get('is_active'),
        );

        if($file = $request->file('photo_id')) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move('images/users', $name);
            $photo = Photo::create(['path'=>$name]);
            $user['photo_id'] = $photo->id;
        }

        User::create($user);

        return redirect('/admin/users');
        /*return $request->all();*/
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
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {


        $user = User::findOrFail($id);

        if(trim($request->get('password') == '')) {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->get('password'));
        }


        if($file = $request->file('photo_id')) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move('images/users', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');
        //return view('admin.users.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('admin.users.edit');
    }
}
