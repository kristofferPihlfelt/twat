<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Site;
use Illuminate\Http\Request;

class AdminSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sites = Site::all()->sortByDesc('created_at');

        //dd($sites);
        return view('admin.sites.index')->with(compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteRequest $request)
    {
        //return $request->credentials_pass;
        $input = $request->all();
        Site::create($input);
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
