<?php namespace App\Models;

use \Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Provider;

/**
 * Esta clase sustituirá el modelo User una vez realizado  el cambui de migrracion en la bd
 * 
 * También conviene ver si es posible convertirla en abstracta y transmitir herencia a los modelos:
 * - Provider\Provider
 * - Client\Client
 * - Manager\Admin
 */
class Account extends Authenticatable
{
    const ACCOUNT_TYPE_MANAGER = 'manager';
    const ACCOUNT_TYPE_PROVIDER = 'provider';
    const ACCOUNT_TYPE_CLIENT = 'client';
    
    const ACCOUNT_STATUS_LOCKED = 0;
    const ACCOUNT_STATUS_ACTIVE = 1;
    const ACCOUNT_STATUS_BANNED = 5;
    
    
    protected $primaryKey = 'account_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'password' , 'status' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'type', 'status', 'instance',
    ];
    /**
     * @param string $value
     */
    public final function setPasswordAttribute( $value ){
        
        $this->attributes['password'] = Hash::make( $value );
        
        return $this;
    }
    /**
     * @return string
     */
    public final function getRole(){
        return $this->attributes['type'];
    }
    /**
     * Marca si la cuenta en uso es de administrador
     * @return boolean
     */
    public final function isAdmin(){
        return $this->getRole() === self::ACCOUNT_TYPE_MANAGER;
    }
    /**
     * Marca si la cuenta en uso es de proveedor
     * @return boolean
     */
    public final function isProvider(){
        return $this->getRole() === self::ACCOUNT_TYPE_PROVIDER;
    }
    /**
     * Marca si la cuenta en uso es de usuario (cliente del proveedor)
     * @return boolean
     */
    public final function isClient(){
        return $this->getRole() === self::ACCOUNT_TYPE_CLIENT;
    }
    /**
     * Lista todas las instancias existentes de la bd en función del estado
     * @param int $status Estado
     * @return array
     */
    public static final function listInstances( $status = self::ACCOUNT_STATUS_ACTIVE ){
        
        $accounts = DB::table('accounts')
                ->select(['accounts.account_id','accounts.instance','providers.company_name'])
                ->join('providers', 'providers.account_id', '=', 'accounts.account_id')
                ->where('accounts.status','>=', $status )
                ->get();
        
        $instances = [];
        
        foreach( $accounts as $acc ){
            $instances[$acc->instance] = [
                'account_id' => $acc->account_id,
                'company_name' => $acc->company_name,
            ];
        }

        return $instances;
    }
    /**
     * Valida la instancia en la bd
     * @param string $instance
     * @param string $type
     * @return boolean
     */
    public static final function validateInstance( $instance , $type = self::ACCOUNT_TYPE_CLIENT ){
        
        $accounts = DB::table('accounts')
                ->select(['accounts.account_id','accounts.instance','providers.company_name'])
                ->join('providers', 'providers.account_id', '=', 'accounts.account_id')
                ->where('accounts.instance','>=', $instance )
                ->where('accounts.type','=', $type )
                ->where('accounts.status', '=', self::ACCOUNT_STATUS_ACTIVE )
                ->get();
        
        return count($accounts) > 0;
    }
}


