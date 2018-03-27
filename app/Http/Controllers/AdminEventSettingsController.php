<?php

namespace App\Http\Controllers;

use App\EventCategory;
use App\EventChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class AdminEventSettingsController extends Controller {

    public function index() {

        $categories = EventCategory::all()->sortBy('name');
        $channels = EventChannel::all()->sortBy('name');

        return view('admin.events.settings', compact('categories', 'channels'));

    }

    public function destroyCategory($id) {

        $category = EventCategory::findOrFail($id);
        $category->delete();
        Session::flash('deleted_category', 'The category was deleted successfully');
        return redirect('/admin/events/settings');

    }

    public function destroyChannel($id) {

        $channel = EventChannel::findOrFail($id);
        $channel->delete();
        Session::flash('deleted_channel', 'The channel was deleted successfully');
        return redirect('/admin/events/settings');

    }

    public function storeChannel(Request $request)
    {
        $data = array(
            'name' => $request->channel,
        );

        EventChannel::create($data);
        Session::flash('created_channel', 'The channel was created successfully');
        return redirect ('/admin/events/settings');
    }

    public function storeCategory(Request $request)
    {
        $data = array(
            'name' => $request->category,
        );

        EventCategory::create($data);
        Session::flash('created_category', 'The category was created successfully');
        return redirect ('/admin/events/settings');
    }




}