<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = ['name', 'barcode', 'qty', 'distributor', 'manufacturer', 'expired', 'buy_price', 'sales_price', 'profit'];


    public function sales()
    {
    	return $this->belongsToMany('App\Sale', 'sale_stock');
    }

    public function purchases()
    {
    	return $this->belongsToMany('App\Purchase', 'purchase_stock');
    }
}
