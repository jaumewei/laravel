<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function( Blueprint $products){

            $products->unsignedInteger( 'product_id', TRUE, TRUE );
            $products->string( 'SKU', 32 );
            //para el prototipo definir el id de proveedor o cuenta en la tabla productos
            $products->unsignedInteger('owner_id');
            
            $products->string( 'name' , 128 );
            $products->longText( 'description' , 256 );
            $products->unsignedTinyInteger( 'status' );

            $products->timestamps();
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
        Schema::dropIfExists('products');
    }
}
