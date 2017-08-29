<?php namespace App\Http\Controllers;

use \Illuminate\Support\Facades\View;
use \Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Request;

/**
 * Controlador público para la gestión de rutas base
 * 
 * Las rutas incluen siempre el primer parámetro de la misma como la instancia
 * Pero otras rutas generales deberían ser tratadas adecuadamente sin pasar por
 * la validación de la aplicación.
 * 
 */
class PublicController extends Controller
{
    /**
     * @param mixed $request
     * @return View
     */
    public final function request( $request ){
        
        
        if(method_exists($this, $request)){
            
            return $this->$request();
        }
        else{
            //capturar desde el directorio de instancias
        }
        
        return View::make('layouts.public.error');
    }
    /**
     * Form de login de usuario
     * @return View
     */
    public final function loginform(){
        
        return View::make('layouts.provider.login');
    }
    /**
     * Form de registro
     * @return View
     */
    public final function registerform(){
        
        return View::make('layouts.public.register');
    }
    /**
     * Registro y redirección al form de login
     * @return View
     */
    public final function register( Request $request ){

        //utilizar la request para capturar todos los datos del registro y la validación
        
        //capturar la instancia desde su perfil de usuario recién creado.
        $instance = 'frescibo';
        
        Redirect::to(sprintf('/%s/provider/login',$instance));
    }
    /**
     * Redirigir al apartado principal del manager o a su form de login si no esta validado
     * @return View
     */
    public final function admin(){
        
        return Redirect::to('/admin/login');
    }
}

