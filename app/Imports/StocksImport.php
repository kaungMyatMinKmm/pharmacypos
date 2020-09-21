<?php

namespace App\Imports;

use App\Stock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StocksImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(collection $request)
    {
        

        $data=$request->slice(1);
        
        // dd($data);
        // die();
        

        foreach ($data as $key => $value) {

            $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value['4']);


                date_default_timezone_set("Asia/Yangon");
                $code = strtotime(date("Y-m-d H:i:s"));

                $stock = Stock::create([
                'name' => $value['0'],
                'barcode' => $code.$key,
                'qty'=> $value['1'],
                'distributor'=> $value['2'],
                'manufacturer' => $value['3'],
                'expired' => $date,
                'buy_price' => $value['5'],
                'sales_price' => $value['6'] ,
                'profit' => $value['7'],
            ]);
        }

       

       
    }
}
