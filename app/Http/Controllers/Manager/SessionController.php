<?php namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Admin;
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
                'name' => 'required',
                'password' => 'required|min:4',
            ) );
        
        if( $validator->fails() ){
            //redirige nuevamente al login rellenando todos los datos del input a excepción del password
            //y adjuntando el validador para recuperar los mensajes de error obtenidos.
            return Redirect::to('admin/login')
                    ->withErrors($validator)
                    ->withInput( $request->except('password'));
        } 
        else{
            //validar solo cuentas de administrador, sin instancia de acceso
            $auth = [
                'instance' => '',
                'type' => Account::ACCOUNT_TYPE_MANAGER,
                'name'=>$request->get('name'),
                'password'=>$request->get('password')];
            
            if( Auth::attempt($auth)){
                
                return Redirect::to('admin/main');
            }
            else{
                return Redirect::to('admin/login');
            }
        }
    }
    /**
     * @return Illuminate\Support\Facades\View
     */
    public final function logout(){
        
        /**
         * Cerrar sesión aqui
         */
        Auth::logout();
        
        return Redirect::to('admin/login');
    }
    /**
     * @return Illuminate\Support\Facades\View
     */
    public final function loginform(){

        return View::make('layouts.manager.login');
    }
}
