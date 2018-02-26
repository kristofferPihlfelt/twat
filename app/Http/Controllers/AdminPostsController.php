<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if( $file = $request->file('photo_id')) {
            //Set name for file
            $name = time() . '-' . $file->getClientOriginalName();
            //move the file
            $file->move('images', $name);
            //create the photo
            $photo = Photo::create(['path' => $name]);
            //insert the photo id
            $input['photo_id'] = $photo->id;
        };

        //Create post
        $user->posts()->create($input);

        //display message from session
        Session::flash('created_post', 'The post was created successfully');

        //redirect to route
        return redirect('/admin/posts');




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
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'categories'));
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
        $input = $request->all();

        if( $file = $request->file('photo_id')) {
            //Set name for file
            $name = time() . '-' . $file->getClientOriginalName();
            //move the file
            $file->move('images', $name);
            //create the photo
            $photo = Photo::create(['path' => $name]);
            //insert the photo id
            $input['photo_id'] = $photo->id;
        };

        Auth::user()->posts()->whereId($id)->first()->update($input);
        Session::flash('updated_post', 'The post was updated successfully');
        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->path);
        $post->photo->delete();
        $post->delete();
        Session::flash('deleted_post', 'The post was deleted successfully');
        return redirect('/admin/posts');
    }


    public function post($id){

        $post = Post::findOrFail($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'comments'));
    }
}
