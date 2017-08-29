<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Gestor de instancias de la aplicación.
 * Acceso y listado a las instancias disponibles en la bd
 */
class InstanceManager extends Model
{
    public final function listInstances(){
        
        $accounts = DB::table('accounts')
                ->select(['accounts.account_id','accounts.instance','providers.company_name'])
                ->join('providers', 'providers.account_id', '=', 'accounts.account_id')
                ->where('accounts.status','>', Account::ACCOUNT_STATUS_ACTIVE)
                ->get();
        
        $instances = [];
        
        foreach( $accounts as $acc ){
            $instances[$acc['instance']] = [
                'account_id' => $acc['account_id'],
                'company_name' => $acc['company_name']
            ];
        }

        return view('user.index', ['users' => $accounts]);
    }
}
