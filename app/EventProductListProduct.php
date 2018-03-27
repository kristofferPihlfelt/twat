<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventProductListProduct extends Model
{

    protected $fillable = [
        'list_id',
        'product_name',
        'supplier',
        'supplier_ref',
        'product_ref',
        'color',
        'quantity',
        'wholesale_price',
        'price_inc_tax',
        'regular_price_inc_tax',
        'is_active',
    ];


    public function productlist() {
        return $this->belongsTo('App\EventProductList');
    }

    protected $table = 'event_product_lists_products';
}
