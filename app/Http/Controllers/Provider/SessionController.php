<?php namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
//use App\Models\Provider;
use App\Models\Account;
/**
 * Controlador de inicio se sesión y registro del proveedor
 */
class SessionController extends Controller
{
    /**
     * @param string $instance Instancia de entrada
     * @return Illuminate\Support\Facades\View
     */
    public final function loginform( $instance ){

        return View::make('layouts.provider.login',[
            'instance' => $instance,
        ]);
    }
    /**
     * Proceso de inicio de sesión
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Support\Facades\View
     */
    public final function login( Request $request ){
        
        $instance = $request->route('instance');
        
        if( strlen($instance) === 0 ){
            
            return Redirect::to('layouts.public.error');
        }
        
        //utilizar Request en lugar de Input
        $validator = Validator::make(  $request->all() , array(
                'name' => 'required|min:4',
                'password' => 'required|min:4',
            ) );
        
        if( !$validator->fails() ){

            //carga el usuario validando su instancia y su nivel de acceso
            $auth = [
                'instance' => $instance,
                'type' => Account::ACCOUNT_TYPE_PROVIDER,
                'name'=>$request->get('name'),
                'password'=>$request->get('password')];
            
            if( Auth::attempt($auth)){
                
                return Redirect::route( sprintf('/%s/provider/main',$instance) );
            }
        } 

        //redirige nuevamente al login rellenando todos los datos del input a excepción del password
        //y adjuntando el validador para recuperar los mensajes de error obtenidos.
        return Redirect::to(sprintf('/%s/provider/login',$instance))
                ->withErrors($validator)
                ->with('message', 'Nombre de usuario o contraseña inv&aacute;lida')
                ->with('alert-class','alert-danger')
                ->withInput( $request->except('password'));
    }
    /**
     * @return Illuminate\Support\Facades\View
     */
    public final function logout( Request $request ){
        
        /**
         * Cerrar sesión aqui
         */
        Auth::logout();
        
        $instance = $request->route('instance');
        
        return Redirect::to(sprintf('/%s/provider/login',$instance) );
    }
}
