<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //

     protected $fillable = ['voucher_no', 'distributor', 'manufacturer','total'];

     public function purchaseStocks()
    {
        return $this->belongsToMany('App\Stock','purchase_stock')->withTimestamps()->withPivot('qty','buy_price', 'expired');
    	
    }
}
