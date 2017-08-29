<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $users) {

            $users->increments('acount_id');
            $users->string('name',32)->unique();
            //$users->string('email',64)->unique();
            $users->string('password',100);
            //definición de tipo de cuenta
            $users->string('type',12);
            //indicador de estado de la cuenta (unsigned, no AutoIncrement)
            $users->unsignedTinyInteger('status');
            //descriptor de punto de entrada para la instancia (cuentas de cliente y distribuidor)
            $users->string('instance',32);
            
            //definición del token de sesión permanente
            $users->rememberToken();
            
            $users->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
