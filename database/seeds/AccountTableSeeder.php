<?php

use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Provider;
use App\Models\Client;

/**
 * Description of AccountTableSeeder
 *
 * @author informatica1
 */
class AccountTableSeeder extends Seeder{
    
    public function run() {

        //vaciado
        Account::truncate();
        Provider::truncate();
        Client::truncate();
        
        //Cuentas maestras;
        Account::create([
            'acount_id' => 1,
            'name' => 'admin',
            'password' => '12345',
            'type' => Account::ACCOUNT_TYPE_MANAGER,
            'status' => Account::ACCOUNT_STATUS_ACTIVE,
            'instance' => '',
        ]);

        Account::create([
            'acount_id' => 2,
            'name' => 'frescibo',
            'password' => '12345',
            'type' => Account::ACCOUNT_TYPE_PROVIDER,
            'status' => Account::ACCOUNT_STATUS_ACTIVE,
            'instance' => 'frescibo',
        ]);

        Account::create([
            'acount_id' => 3,
            'name' => 'restaurante',
            'password' => '12345',
            'type' => Account::ACCOUNT_TYPE_CLIENT,
            'status' => Account::ACCOUNT_STATUS_ACTIVE,
            'instance' => 'frescibo',
        ]);

        //Proveedores
        Provider::create([
            'account_id' => 2, //frescibo
            'company_name' => 'Fresc i Bo Menorca',
            'email' => 'frescibo@taovisual.eu',
            'telephone' => '680596360',
            'cif' => '12324D',
            'address_street' => 'mi calle',
            'address_city' => 'mi ciudad',
            'address_postcode' => '078465',
            'address_state' => 'estado',
            'address_country' => 'pais',
        ]);

        //Clientes
        Client::create([
            'owner_id' => 2, //frescibo
            'account_id' => 3, //restaurante
            'company_name' => 'Bar Restaurante BaixaMar',
            'email' => 'restaurante@taovisual.eu',
            'telephone' => '680596360',
            'cif' => 'ABC234',
            'address_street' => 'mi calle',
            'address_city' => 'mi ciudad',
            'address_postcode' => '078465',
            'address_state' => 'estado',
            'address_country' => 'pais',
        ]);
    }
}
