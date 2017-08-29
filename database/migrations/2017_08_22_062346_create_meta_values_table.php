<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('meta_values', function( Blueprint $values ){ 
            
            $values->string('meta_id',16);
            $values->unsignedInteger('owner_id'); //propietario del meta
            //id de la cuenta de proveedor
            $values->unsignedInteger('meta_source');
            
            $values->string('meta_value',32);
            //de momento definir un parent para poder asociar una jerarquía
            //$values->string('meta_parent',32);
            //de momento agregar timestamps
            $values->timestamps();
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
        Schema::dropIfExists('meta_values');
    }
}
