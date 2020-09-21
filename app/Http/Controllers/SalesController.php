<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use App\Stock;
use App\SaleStock;
use Auth;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $salesSale::all();

        $start = date('Y-m-d',strtotime($request->input('from')));
        $end = date('Y-m-d',strtotime($request->input('to')));

        // dd($start);
        // die();    
       if(request('from')&&request('to')){

        $sales = Sale::whereBetween('sale_date', [$start,$end])->get();
        }else{
            $sales=Sale::all();
        }

        // dd($request);
        // die();

        $users = User::all();
        // $stocks = $sales->stocks;
        // dd($stocks);
        // die();
        return view('admin.sales.index', compact('sales','users'));
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
    public function store(Request $request )
    {   

        
        $data = request('data');

        $total = request('total');
  

        date_default_timezone_set('Asia/Rangoon');
        $voucher_no = strtotime(date("h:i:s"));
        $sale_date = date('Y-m-d');
        $user_id = auth()->user()->id;

        $sale = Sale::create([
            'user_id' => Auth::user()->id,
            'voucher_no' => $voucher_no,
            'total' => $total,
            'sale_date' => $sale_date
            
        ]);
        
        
        // $sale->total=$total;

        

        foreach ($data as $key => $value) {
            // print_r($value);
            // die();

            SaleStock::create([
                'sale_id'=>$sale['id'],
                'stock_id' => $value['id'],
                'qty' => $value['qty'],
           ]);
        }

        // $sale->save();
                                                                           
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $salessh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sale = Sale::findOrfail($id);
        $users = User::all();
        

        return view('admin.sales.show', compact('sale','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sale = Sale::find($id);
        $sale->delete();

        return redirect()->route('sales.index');
    }
}
