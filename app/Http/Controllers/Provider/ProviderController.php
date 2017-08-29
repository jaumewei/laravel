<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public final function profile(){
        
        return 'Vista de perfil de Distribuidor (cuenta de cliente)';
    }
    /**
     * 
     * @return View
     */
    public final function update(){
        
        return Redirect::to('profile');
    }
}
