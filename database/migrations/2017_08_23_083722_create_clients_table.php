<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients', function(Blueprint $clients ){
            //id de cuenta de cliente en la versión de bd única
            $clients->unsignedInteger('owner_id');
            //id de cliente relacionado con la cuenta (usuario) no confundir con owner_id que es la instancia donde está definido
            $clients->unsignedInteger('account_id');
            $clients->string('company_name',255);
            $clients->string('email',64);
            $clients->string('telephone',20);
            $clients->string('cif',16);
            $clients->string('address_street',255);
            $clients->string('address_city',64);
            $clients->string('address_postcode',8);
            $clients->string('address_state',32);
            $clients->string('address_country',32);
            
            $clients->timestamps();
            
            $clients->primary([ 'owner_id','account_id'] );
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
        Schema::dropIfExists('clients');
    }
}
