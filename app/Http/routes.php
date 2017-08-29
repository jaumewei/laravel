<?php

/* ACCESO PUBLICO */
Route::get('/', function () {
    //redirigir a la web principal
    return view('layouts.public.home');
});
/*Route::get('/{request}',array(
    'uses' => 'PublicController@request'
));*/
//validación del registro
Route::post('/register', array(
    'as' => 'public.register',
    'uses' => 'PublicController@register'));
//validación del registro
Route::post('/login', array(
    'as' => 'public.login',
    'uses' => 'PublicController@login'));

/* ACCESO AL ADMINISTRADOR */
Route::get('/admin/login', array(
    'as' => 'admin.login',
    'uses' => 'Manager\SessionController@loginform'
));
/* ACCESO A INSTANCIA DE PROVEEDOR */
Route::get('/{instance}/provider/login', array(
    'as'=>'provider.login',
    'uses'=>'Provider\SessionController@loginform'));
//validación del registro POST
Route::post('/{instance}/provider/login', array(
    'as' => 'provider.login',
    'uses' => 'Provider\SessionController@login'));

/* ACCESO A INSTANCIA DE CLIENTE */
Route::get('/{instance}/client', function( $instance ){
    //redirección a client/login si no ha validado convenientemente
    return sprintf('Acceso cliente %s a client/order o redirección a client/login',$instance);
});
Route::get('/{instance}/client/login', array(
    'as' => 'clientlogin',
    'uses' => 'Client\SessionController@loginform'));

    /* ACCESO AL ADMINISTRADOR */
    Route::get('/admin/logout',array(
        'as' => 'logout',
        'uses' => 'Manager\SessionController@logout'
    ));
    Route::get('/admin/accounts',array(
        'as' => 'accounts',
        'uses' => 'Manager\AccountController@listaccounts'
    ));

    /* ACCESO A INSTANCIA DE PROVEEDOR */
    Route::get('/{instance}/provider/main', [
        'as'=>'provider.main',
        'uses'=>'Provider\OrderController@listpending' ] );
    Route::get('/{instance}/provider/logout', array(
        'as' => 'provider.logout',
        'uses' => 'Provider\SessionController@logout'));
    Route::get('/{instance}/provider/pending', array(
        'as'=>'provider.pending',
        'uses'=>'Provider\OrderController@listpending'));
    Route::get('/{instance}/provider/history', array(
        'as'=>'provider.history',
        'uses'=>'Provider\OrderController@listhistory'));
    Route::get('/{instance}/provider/archive', array(
        'as'=>'provider.archive',
        'uses'=>'Provider\AttachmentController@listattachments'));
    Route::get('/{instance}/provider/users', array(
        'as' => 'provider.users',
        'uses' => 'Provider\ClientController@listusers'));
    Route::get('/{instance}/provider/profile', array(
        'as'=>'provider.profile',
        'uses'=>'Provider\ProviderController@profile'));
    Route::get('/{instance}/provider/settings', array(
        'as'=>'provider.settings',
        'uses'=>'Provider\AttachmentController@settings'));

    /* ACCESO A INSTANCIA DE CLIENTE */
    Route::get('/{instance}/client/logout', array(
        'as' => 'clientlogout',
        'uses' => 'Client\SessionController@logout'
    ));
    Route::get('/{instance}/client/order', array(
        'as' => 'clientorder',
        'uses' => 'Client\OrderController@orderform'
    )); 
    Route::get('/{instance}/client/history', array(
        'as' => 'clienthistory',
        'uses' => 'Client\OrderController@listorders'
    )); 
    Route::get('/{instance}/client/profile', array(
        'as' => 'clientprofile',
        'uses' => 'Client\ClientController@profile'
    )); 

/* ACCESO CON VALIDACION */
Route::group(['middleware' => 'web'], function () {

    Route::auth();

});