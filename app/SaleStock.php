<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStock extends Model
{
    //
    protected $table = 'sale_stock';
    protected $fillable = ['sale_id', 'stock_id', 'qty'];
}
