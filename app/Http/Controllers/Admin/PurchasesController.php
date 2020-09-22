<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Purchase;
use App\Stock;
use App\PurchaseStock;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $start = date('Y-m-d',strtotime($request->input('from')));
        $end = date('Y-m-d',strtotime($request->input('to')));

        // dd($start);
        // // die();
       if(request('from')&&request('to')){

        $purchases = Purchase::whereBetween('created_at', [$start,$end])->get();

        }else{

            $purchases = Purchase::latest()->get();
        }
        
        return view('admin.purchases.index',compact("purchases"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $purchases = Purchase::all();
        $stocks = Stock::all();

        return view('admin.purchases.create',compact("purchases","stocks"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $data = request('data');
        
        if ($data) {
            # code...
                
                 $request->validate([
                    'voucher_no'=> 'required',
                    'total' => 'required',
                    'distributor'=> 'required',
                    'manufacturer'=>'required',
                    'qty' =>'required'
                ]);

                $voucher_no = request('voucher_no');
                $total = request('total');
                $distributor = request('distributor');
                $manufacturer = request('manufacturer');



                $purchase = Purchase::create([

                    'voucher_no' => $voucher_no,
                    'distributor' => $distributor,
                    'manufacturer' => $manufacturer,
                    'total' => $total,
                ]);
                
                 
                foreach ($data as $key => $value) {

                     PurchaseStock::create([
                        'purchase_id' => $purchase['id'],
                        'stock_id' => $value['id'],
                        'qty' => $value['qty'],
                        'buy_price'=>$value['price'],
                        'expired'=>$value['expired'],
                   ]);
                }
             }

             return redirect()->route('admin.purchases.create')->with('info','Successfully Added!');
        
        

       
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $purchase = Purchase::findOrFail($id);
    
        return view('admin.purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $purchase = Purchase::find($id);

        $purchase->delete();

        return redirect()->route('admin.purchases.index')->with('delete',"Successfully Deleted!");
    }
}
