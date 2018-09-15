<?php

namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Westsoft\Acl\Models\UserProfiles;
use Westsoft\Acl\Models\ProfilePermissions;
use Westsoft\Acl\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $profiles_user = UserProfiles::where('users_id', '=', $id)->get();

        $permissions = array();
        /**
         *  Para cada perfil do usuario busca as permissões
         */
        foreach($profiles_user as $pu){
            $profile_permissions = ProfilePermissions::where('profiles_id', $pu->profiles_id)->get();
            /**
             * Permissão do perfil busca o nome
             */
            foreach($profile_permissions as $pp){
                $aux = Permissions::where('id', $pp->permissions_id)->first();
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
        $request->session()->put('permissions', $permissions);

        /**
         *  Segurança: session->regenerate() - Ao fazer isso mesmo que a sessão seja
         *  roubada estará seguro pois a partir do momento que faz isso o identificador
         *  da sessão muda e automaticamente inválida a versão anterior.
         */
        $request->session()->regenerate();

        return view('home');
    }
}
