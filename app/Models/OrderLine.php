<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
   public final function order(){

       return $this->belongsTo( 'Order' ,'order_id','order_id' );
   }
}
