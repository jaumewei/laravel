<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Description of AdminController
 *
 * @author informatica1
 */
class AdminController extends Controller {
    
    public final function main(){
        
        return 'Manager Main View';
    }
}
