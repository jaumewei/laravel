<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Info requerida
        
        //DEMO DATA
        
        //seeed de cuentas y roles
        $this->call( 'AccountTableSeeder' );
        //seed de productos y pedidos
        $this->call( 'ProductTableSeeder' );
        $this->call( 'OrderTableSeeder');
    }
}
