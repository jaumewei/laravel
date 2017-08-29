<?php namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Client extends Account
{
    //
    public final function orders(){
        
        return $this->hasMany('Order','account_id','owner_id');
    }
}
