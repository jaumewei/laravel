<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_lines', function( Blueprint $products){

            $products->unsignedInteger( 'order_id' );
            $products->unsignedInteger( 'owner_id' );
            $products->unsignedInteger( 'line_id' );
            $products->unsignedInteger( 'product_id' );
            $products->unsignedInteger( 'units' );
            
            //Esto debería gestionarse mediante los metas preferiblemente en adelante
            $products->string( 'unit_type', 16 );
            //de momento no admitir soft-deletion
            //$products->unsignedTinyInteger( 'status' ); //
            $products->timestamps();
            
            $products->index( [ 'owner_id' ,'order_id' , 'product_id', 'line_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('order_lines');
    }
}
