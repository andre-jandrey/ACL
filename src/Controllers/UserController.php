<?php
namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('acl::users.index', compact('users'));
    }

    public function show($id){
        $users = User::find($id);
        if(empty($users)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($users);
        return view('acl::users.show', compact('users'));
    }

    public function create(){
        return view('acl::users.create-edit');
    }

    public function edit($id){
        $users = User::find($id);
        if(empty($users)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($users);
        return view('acl::users.create-edit', compact('users'));
    }

    public function update(UsersRequest $request, $id){
        $users = User::find($id);
        $users ->update($request->all());
        // return response()->json($users);
        return redirect()->action('UsersController@index')->withInput($request->only('nome'));
    }


    public function store(UsersRequest $request){
        $data = $request->all();
        $data['password']=bcrypt($data['password']);

        $users = User::create($data);
        //return response()->json($users);
        return redirect()->action('UsersController@index')->withInput($request->only('nome'));
    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        return redirect('users')->with('success', 'Usuário deletado com sucesso!');
    }


}
?>
