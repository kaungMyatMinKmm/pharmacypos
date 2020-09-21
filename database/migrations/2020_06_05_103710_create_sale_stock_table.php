<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            
            $table->unsignedBiginteger('stock_id');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');

            $table->unsignedBiginteger('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_stock');
    }
}
