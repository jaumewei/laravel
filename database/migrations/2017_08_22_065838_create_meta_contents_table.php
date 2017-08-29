<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('meta_contents', function(Blueprint $contents){
            $contents->string('meta_id',16);       //identificador del meta
            $contents->unsignedInteger('owner_id'); //propietario del meta
            $contents->string('meta_source',16);   //origen asociativo del meta (tabla)
            $contents->string('meta_value',32);     //valor de la opción de meta
            $contents->string('meta_label',32);     //valor a visualizar  para la opción de meta
            
            $contents->primary([ 'owner_id','meta_id','meta_source','meta_value' ]);
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
        Schema::dropIfExists('meta_contents');
    }
}
