<?php namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    public final function listattachments( Request $request ){
        
        return 'Lista de exportaciones y ficheros generados';
    }
}
