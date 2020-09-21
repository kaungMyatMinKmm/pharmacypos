<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseStock extends Model
{
    //
    protected $table = 'purchase_stock';
    protected $fillable = ['stock_id', 'purchase_id','qty','buy_price','expired'];
}
