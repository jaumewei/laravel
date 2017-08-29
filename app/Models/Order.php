<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDER_STATUS_DRAFT = 0;
    const ORDER_STATUS_PENDING = 1;
    const ORDER_STATUS_COMPLETED = 2;
    
    public final function client(){
        
        return $this->belongsTo('Client','owner_id','account_id');
    }
    
    public final function provider(){
        
        return $this->belongsTo('Provider','owner_id','account_id');
    }
    
    public final function lines(){
        
        return $this->hasMany('OrderLine', 'order_id', 'order_id');
    }
}
