<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = ['user_id','voucher_no', 'total', 'sale_date'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function stocks()
    {
        return $this->belongsToMany('App\Stock')->withTimestamps()->withPivot('qty');
    	
    }
}
