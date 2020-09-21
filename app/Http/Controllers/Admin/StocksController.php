<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\StocksImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Stock;
use App\User;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $nearestExp = $request->input('nearest_exp');
        $lessStocks = $request->input('less_stocks');
        if ($nearestExp) {
            $stocks = Stock::orderBy('expired', 'asc')->get();
        }else if($lessStocks){
            $stocks = Stock::orderBy('qty', 'asc')->get();
        }else{
             $stocks = Stock::all();
        }

        $users  = User::all();
        return view('admin.stocks.index', compact('stocks','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stocks.create');
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

        date_default_timezone_set("Asia/Yangon");
        $code = strtotime(date("Y-m-d H:i:s"));

        if ($request->file('file')){

          $file = $request->file('file');
          $data = Excel::import(new StocksImport, $file);
        } else {
          $request->validate([
            'name' => 'required|string|max:191',
            'qty' => 'required|integer|max:191',
            'distributor' => 'required|string|max:191',
            'manufacturer' => 'required|string|max:191',
            'expired' => 'required|string|max:191',
            'buy_price' => 'required|string|max:191',
            'sales_price' => 'required|string|max:191',
            'profit' => 'required|string|max:191',
            ]);

        

        

        $stock = new Stock;
        $stock->name = request('name');
        $stock->qty = request('qty');
        $stock->barcode = $code;
        $stock->distributor = request('distributor');
        $stock->manufacturer = request('manufacturer');
        $stock->expired = request('expired');
        $stock->buy_price = request('buy_price');
        $stock->sales_price = request('sales_price');
        $stock->profit = request('profit');

        $stock->save();
        
      }
        

        return redirect()->route('admin.stocks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);
        
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

        $stock = Stock::findOrFail($id);
        // dd($stock['name']);
        // die();
        return view('admin.stocks.edit', compact('stock'));
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
          $request->validate([
            'name' => 'required|string|max:191',
            'qty' => 'required',
            'distributor' => 'required|string|max:191',
            'manufacturer' => 'required|string|max:191',
            'expired' => 'required|string|max:191',
            'buy_price' => 'required|string|max:191',
            'sales_price' => 'required|string|max:191',
            'profit' => 'required|string|max:191',
        ]);

        $stock = Stock::find($id);
        $stock->name = request('name');
        $stock->qty = request('qty');
        $stock->distributor = request('distributor');
        $stock->manufacturer = request('manufacturer');
        $stock->expired = request('expired');
        $stock->buy_price = request('buy_price');
        $stock->sales_price = request('sales_price');
        $stock->profit = request('profit');

        $stock->save();

        return redirect()->route('admin.stocks.index');
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
        $stock = Stock::find($id);
        $stock->delete();

        return redirect()->route('admin.stocks.index');
    }
}
