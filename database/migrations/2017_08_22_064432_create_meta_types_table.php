<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('meta_types', function( Blueprint $types ){
            $types->string('meta_id',16);       //identificador del meta
            $types->unsignedInteger('owner_id'); //propietario del meta
            $types->string('meta_type',16);     //tipo de valor del meta (para conversión)
            $types->string('meta_source',16);   //origen asociativo del meta (tabla)
            $types->string('meta_default');     //valor por defecto
            $types->boolean('multi_value');     //admite varios valores a la vez
            
            $types->primary([ 'owner_id','meta_id' ]);
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
        Schema::dropIfExists('meta_types');
    }
}
