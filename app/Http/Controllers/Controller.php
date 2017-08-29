<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    /**
     * Prepara los datos adjuntos en la vista
     * @param array $data
     * @return array
     */
    protected function parseViewData( Request $request, array $data = [] ){
        
        $instance = $request->route('instance');
        
        $output = !is_null($data) ? $data : [];

        return !is_null($instance) ?
                array_merge( [ 'instance' => $instance, $output ] ) :
                $output;
    }
    /**
     * Valida la acción solicitada del usuario
     * @return boolean
     */
    protected final function validateAction(){
        
        if( Auth::check() ){
            
            
        }
        
        return FALSE;
    }
}




