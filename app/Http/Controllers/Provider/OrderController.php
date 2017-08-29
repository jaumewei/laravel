<?php namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Provider;
use App\Models\Order;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
/**
 * 
 */
class OrderController extends Controller
{   
    /**
     * @param Request $request
     * @return View
     */
    public  final function listpending( Request $request ){

        $provider = Provider::find(Auth::user()->account_id);
        
        var_dump($provider);
        die;
        
        /**
         * Generar el modelo de listado de pedidos
         */
        $order = Order::owner_id($owner_id)->paginage(20);
        
        var_dump(compact($order));
        die;
        
        
        return View::make('layouts.provider.order-list',$this->parseViewData( $request ) );
    }
    /**
     * 
     * @param Request $request
     * @return View
     */
    public final function listhistory( Request $request ){
        
        
        return View::make('layouts.provider.order-list',$this->parseViewData($request));
    }
}
