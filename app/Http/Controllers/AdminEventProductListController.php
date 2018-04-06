<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventProductList;
use App\EventProductListProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminEventProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::pluck('title', 'id')->all();

        return view('admin.events.productlist.create', compact('events'));
    }

    public function createProduct()
    {
        $lists = EventProductList::pluck('name', 'id')->all();

        return view('admin.events.productlist.product.create', compact('lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'event_id' => $request->event_id,
            'name' => $request->name,
        );

        EventProductList::create($data);
        Session::flash('created_productlist', 'The productlist was created successfully');
        return redirect ('/admin/events/');

    }

    public function storeProduct(Request $request)
    {

        EventProductListProduct::create($request->all());
        Session::flash('added_product', 'The product was added successfully');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventProductList  $eventProductList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = EventProductListProduct::all()->where('list_id', '==', $id);
        $productList = EventProductList::findOrFail($id);

        /*$productList = EventProductList::all()->where('id', '==', $id);*/

        return view('admin.events.productlist.show', compact('products', 'productList', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventProductList  $eventProductList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productList = EventProductList::findOrFail($id);
        $events = Event::pluck('title', 'id');

        return view('admin.events.productlist.edit', compact('productList', 'events'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventProductList  $eventProductList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productList = EventProductList::findOrFail($id);

        $productList->update($request->all());
        Session::flash('updated_list', 'The list was updated successfully');
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventProductList  $eventProductList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productList = EventProductList::findOrFail($id);
        $productList->delete();
        return redirect('admin/events/');
    }
}
