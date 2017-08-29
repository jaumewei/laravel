<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders', function( Blueprint $orders ){
            //generar ID autoincrementable sin signo
            $orders->unsignedInteger( 'order_id',TRUE,TRUE );
            $orders->unsignedInteger( 'owner_id' );
            $orders->unsignedInteger( 'user_id' );
            $orders->unsignedTinyInteger( 'status' );
            //las delegaciones se gestionarán como metas adjuntos de pedido
            //$headers->string( 'delegation', 32 );

            $orders->timestamps();
            
            //$orders->dropIndex('order_id');
            //entra en conflicto con la definición de order_id
            //$orders->primary([ 'account_id', 'user_id', 'order_id' ] );
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
        Schema::dropIfExists('orders');
    }
}


