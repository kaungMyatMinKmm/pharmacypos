<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\User;
use App\Stock;
use App\Sale;
use App\Purchase;
use App\PurchaseStock;
use App\SaleStock;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $today = Sale::whereDate('created_at', today())->get();
        $this_year = Sale::whereYear('created_at','=', date('Y'))->get();
        $users = User::all();
        $stocks = Stock::all();
        $sales = Sale::all();
        $purchases = Purchase::all();
        $purchasestocks = PurchaseStock::all();
        $salestocks = SaleStock::all();
       

        return view('admin.dashboard.index', compact('users','stocks','sales','purchases','purchasestocks','salestocks','today','this_year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function earn(Request $request)
    {
        //
        $jan = Sale::whereMonth('sale_date',"=","01")->get();
        $feb = Sale::whereMonth('sale_date',"=","02")->get();
        $march = Sale::whereMonth('sale_date',"=","03")->get();
        $april = Sale::whereMonth('sale_date',"=","04")->get();
        $may = Sale::whereMonth('sale_date',"=","05")->get();
        $june = Sale::whereMonth('sale_date','=',"06")->get();
        $july = Sale::whereMonth('sale_date',"=","07")->get();
        $aug = Sale::whereMonth('sale_date',"=","08")->get();
        $sep = Sale::whereMonth('sale_date',"=","09")->get();
        $oct = Sale::whereMonth('sale_date',"=","10")->get();
        $nov = Sale::whereMonth('sale_date',"=","11")->get();
        $dec = Sale::whereMonth('sale_date',"=","12")->get();

        $jan_total=0;
        foreach ($jan as $key => $value) {
               $jan_total += $value->total;
            }


        $feb_total=0;
        foreach ($feb as $key => $value) {
               $feb_total += $value->total;
            }

        $march_total=0;
        foreach ($march as $key => $value) {
               $march_total += $value->total;
            }

        $april_total=0;
        foreach ($april as $key => $value) {
               $april_total += $value->total;
            }

        $may_total=0;
        foreach ($may as $key => $value) {
               $may_total += $value->total;
            }


        $june_total=0;
        foreach ($june as $key => $value) {
               $june_total += $value->total;
            }


        $july_total=0;
        foreach ($july as $key => $value) {
               $july_total += $value->total;
            }


        $aug_total=0;
        foreach ($aug as $key => $value) {
               $aug_total += $value->total;
            }


        $sep_total=0;
        foreach ($sep as $key => $value) {
               $sep_total += $value->total;
            }


        $oct_total=0;
        foreach ($oct as $key => $value) {
               $oct_total += $value->total;
            }


        $nov_total=0;
        foreach ($nov as $key => $value) {
               $nov_total += $value->total;
            }


        $dec_total=0;
        foreach ($dec as $key => $value) {
               $dec_total += $value->total;
            }


        $total = [$jan_total,$feb_total,$march_total,$april_total,$may_total,$june_total,$july_total,$aug_total,$sep_total,$oct_total,$nov_total,$dec_total];

      
        echo json_encode($total);

       
    }
}
