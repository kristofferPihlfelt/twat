<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    public function index() {
        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create() {
        return view('admin.media.create');
    }

    public function store(Request $request) {
        $file = $request->file('file');

        $name = time() . '-' . $file->getClientOriginalName();
        $file->move('images', $name);
        Session::flash('uploaded_media', 'The media was uploaded successfully');
        Photo::create(['path'=>$name]);
    }

    public function destroy($id) {

       $photo = Photo::findOrFail($id);
       unlink(public_path() . $photo->path);
       $photo->delete();
       Session::flash('deleted_media', 'The media was deleted successfully');
       return redirect('/admin/media');
    }
}

