<?php namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Client;
use App\Models\Account;

/**
 * Controlador de inicio se sesión y registro del proveedor
 */
class SessionController extends Controller
{
    /**
     * Proceso de inicio de sesión
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Support\Facades\View
     */
    public final function login( Request $request ){
                //utilizar Request en lugar de Input
        $validator = Validator::make(  $request->all() , array(
                'name' => 'required|min:4',
                'password' => 'required|min:4',
                //'instance' => 'required|min:4',
            ) );
        
        $instance = $request->route('instance');
        
        if( $validator->fails() ){
            //redirige nuevamente al login rellenando todos los datos del input a excepción del password
            //y adjuntando el validador para recuperar los mensajes de error obtenidos.
            return Redirect::to('client/login')
                    ->withErrors($validator)
                    ->withInput( $request->except([ 'password','instance' ]));
        } 
        else{
            //solo admitir el acceso de aquellas cuentas que sean clientes de un proveedor
            //y a una instancia determinada.
            $auth = [
                'instance'=>$instance,
                'type'=>Account::ACCOUNT_TYPE_CLIENT,
                'name'=>$request->get('name'),
                'password'=>$request->get('password')];
            
            if( Auth::attempt($auth)){
                
                return Redirect::to( sprintf('/%s/client',$instance));
            }
            else{
                return Redirect::to(sprintf('/%s/client/login',$instance));
            }
        }
    }
    /**
     * @return Illuminate\Support\Facades\View
     */
    public final function logout( ){
        
        /**
         * Cerrar sesión aqui
         */
        Auth::logout();
        //capturar la instancia dessde la clase Auth
        $instance = '';
        
        return Redirect::to(sprintf('/%s/client/login',$instance));
    }
    /**
     * @return Illuminate\Support\Facades\View
     */
    public final function loginform(){

        return View::make('layouts.client.login');
    }
}
