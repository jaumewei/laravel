<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Provider extends Model
{
    protected $primaryKey = 'account_id';
    
    public function orders(){
        
        return $this->hasMany('Order');
    }
    
    public final function listOrders( $status = Order::ORDER_STATUS_PENDING , $exclusive = FALSE ){
        
        $orders = DB::table('orders')
                ->select(['orders.order_id'])
                ->join('providers', 'providers.account_id', '=', 'orders.owner_id')
                ->where('orders.status', $exclusive ? '=' : '>=', $status )
                ->get();

        return $orders;
    }
}
