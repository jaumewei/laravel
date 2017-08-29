<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderLine;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PEDIDO NO 1
        Order::create([
            'order_id' => 1,
            'owner_id' => 2,
            'user_id' => 3,
            'status' => Order::ORDER_STATUS_COMPLETED,
            'created_at' => '2017-06-01 10:20:00',
            'updated_at' => '2017-06-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 1,
            'owner_id' => 2,
            'line_id' => 1,
            'product_id' => 2,
            'units' => 3.5,
            'unit_type' => 'bag',
            'created_at' => '2017-06-01 10:20:00',
            'updated_at' => '2017-06-01 10:20:00',
        ]);
        OrderLine::create([
            'order_id' => 1,
            'owner_id' => 2,
            'line_id' => 2,
            'product_id' => 3,
            'units' => 8.10,
            'unit_type' => 'kg',
            'created_at' => '2017-06-01 10:20:00',
            'updated_at' => '2017-06-04 10:20:00',
        ]);
        //PEDIDO NO.2
        Order::create([
            'order_id' => 2,
            'owner_id' => 2,
            'user_id' => 3,
            'status' => Order::ORDER_STATUS_PENDING,
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 2,
            'owner_id' => 2,
            'line_id' => 1,
            'product_id' => 1,
            'units' => 2.85,
            'unit_type' => 'kg',
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 2,
            'owner_id' => 2,
            'line_id' => 2,
            'product_id' => 2,
            'units' => 2.85,
            'unit_type' => 'kg',
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 2,
            'owner_id' => 2,
            'line_id' => 3,
            'product_id' => 3,
            'units' => 4.85,
            'unit_type' => 'kg',
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 2,
            'owner_id' => 2,
            'line_id' => 4,
            'product_id' => 4,
            'units' => 2.85,
            'unit_type' => 'kg',
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
        OrderLine::create([
            'order_id' => 2,
            'owner_id' => 2,
            'line_id' => 5,
            'product_id' => 2,
            'units' => 3.85,
            'unit_type' => 'kg',
            'created_at' => '2017-08-01 10:20:00',
            'updated_at' => '2017-09-04 16:12:00',
        ]);
    }
}
