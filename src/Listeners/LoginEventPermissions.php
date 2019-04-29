<?php
namespace Westsoft\Acl\Listeners;

use Illuminate\Support\Facades\Auth;
use Westsoft\Acl\Models\Permission;
use Westsoft\Acl\Models\ProfilePermissions;
use Westsoft\Acl\Models\UserProfiles;


class LoginEventPermissions
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        /**
         *  Pega o Id do usuário logado no momento,
         *  só chegara neste método se estiver logado protegido
         *  pelo middleware auth no construtor.
         */
        $id = Auth::id();

        /**
         *  Busca todos os profiles que estão relacionados com o usuário logado
         */
        $profiles_user = UserProfiles::where('user_id', '=', $id)->get();
        
        $permissions = array();
        /**
         *  Para cada perfil do usuario busca as permissões
         */
        $profiles = array();
        foreach ($profiles_user as $pu) {
            /* Guarda os perfil do usuario para consoltar dados posteriores */
            $profiles[] = $pu->profiles_id;

            $profile_permissions = ProfilePermissions::where('profiles_id', $pu->profiles_id)->get();
            /**
             * Permissão do perfil busca o nome
             */
            foreach ($profile_permissions as $pp) {
                $aux = Permission::where('id', $pp->permissions_id)->first();
                /**
                 * Nome da permissão, ex: users.store
                 */
                $permissions[] = $aux->name;
            }
        }
        //Habilitarpara ver as permissões
        //dd($permissions);

        /**
         *  session()->put() - Cria o array com as permissões na sessão.
         */
        
        app('request')->session()->put('permissions', $permissions);
        /**
         *  Segurança: session->regenerate() - Ao fazer isso mesmo que a sessão seja
         *  roubada estará seguro pois a partir do momento que faz isso o identificador
         *  da sessão muda e automaticamente inválida a versão anterior.
         */
        app('request')->session()->regenerate();
    }
 
 
    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        // Remove a sessão quando usuário faz logout
        //app('request')->session()->destroy();
        //dd($event);
    }
 
 
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'Westsoft\Acl\Listeners\LoginEventPermissions@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'Westsoft\Acl\Listeners\LoginEventPermissions@onUserLogout'
        );
    }
 
}
