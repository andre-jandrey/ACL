<?php

namespace Westsoft\Acl\Middleware;

use Closure;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Aqui vai o código para ler o JWT e verificar o que está inserido na chave "profile".
         * Por enquanto estou enviando manual pelo request, ex: 1 = CAIXA, 2 = ADMIN.
         */

        //$payload = auth()->guard('api')->payload();

        // then you can access the claims directly e.g.

        $action = $request->route()->getName(); //nome da rota, açãa

        $profile = $request['profile']; //perfil da pessoa, vai vir pelo JWT

        /**
         *  Request->session()->get - Recupera os dados da sessão
         */
        $permissions = $request->session()->get('permissions', []);

        /**
         * Se não existe as permissões, ou a ação requerida (nome da rota) não existe nessa lista
         * de permissões, ele não deixa a pessoa prosseguir e informa "Não autorizado" com código 401.
         */
        //dd($action);
        if (!isset($permissions) or !in_array($action, $permissions) ){
            $data = ['data' => 'Não autorizado.'];
            $headers = array('Content-Type' => 'application/json;charset=utf8');
            return response()->json($data, 401, $headers, JSON_UNESCAPED_UNICODE);

        }

        /**
         * Se chegou até aqui é porque existe a permissão, então deixa passar chamando função $Next;
         */
        return $next($request);
    }
}
