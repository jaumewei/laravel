<?php namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public final function listusers( Request $request ){
        
        return 'Listado de clientes';
    }
}
