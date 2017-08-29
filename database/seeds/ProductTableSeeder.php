<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        
        Product::create([
            'product_id' => 1,
            'SKU' => 'PA001',
            'owner_id' => 2,    //frescibo
            'name' => 'Patata blanca',
            'description' => 'patata blanca a granel',
            'status' => Product::PRODUCT_STATUS_AVAILABLE,
        ]);

        Product::create([
            'product_id' => 2,
            'SKU' => 'PA002',
            'owner_id' => 2,    //frescibo
            'name' => 'Patata entera',
            'description' => 'patata entera a granel',
            'status' => Product::PRODUCT_STATUS_AVAILABLE,
        ]);

        Product::create([
            'product_id' => 3,
            'SKU' => 'PA003',
            'owner_id' => 2,    //frescibo
            'name' => 'Patata gallega',
            'description' => 'patata gallega a granel',
            'status' => Product::PRODUCT_STATUS_AVAILABLE,
        ]);

        Product::create([
            'product_id' => 4,
            'SKU' => 'PA004',
            'owner_id' => 2,    //frescibo
            'name' => 'Patata roja',
            'description' => 'patata roja a granel',
            'status' => Product::PRODUCT_STATUS_UNAVALIABLE,
        ]);

    }
}
