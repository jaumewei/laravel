<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('providers', function(Blueprint $providers ){
            //ID de la cuenta asociado al id de usuario
            $providers->unsignedInteger('account_id');

            $providers->string('company_name',255);
            $providers->string('email',64);
            $providers->string('telephone',20);
            $providers->string('cif',16);
            $providers->string('address_street',255);
            $providers->string('address_city',64);
            $providers->string('address_postcode',8);
            $providers->string('address_state',32);
            $providers->string('address_country',32);
            
            $providers->timestamps();
            
            $providers->primary('account_id');
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
        Schema::dropIfExists('providers');
    }
}
