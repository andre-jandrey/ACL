<?php

namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Westsoft\Acl\Models\Permission;

class PermissionController extends Controller
{
    public function index(){

        $permissions = Permission::all();
        return view('acl::permissions.index', compact('permissions'));
    }

    public function show($id){

        $permission = Permission::find($id);
        if( !$permission ) {
            return back()->withErrors('Permissão não encontrada.');
        }

        return view('acl::permissions.show', compact('permission'));
    }

    public function create(){

        return view('acl::permissions.create-edit');
    }

    public function edit($id){

        $permission = Permission::find($id);
        if( !$permission ) {
            return back()->withErrors('Permissão não encontrada.');
        }

        return view('acl::permissions.create-edit', compact('permission'));
    }

    public function update(Request $request, $id){

        $permission = Permission::find($id);
        $data = $request->all();

        $permission->update($data);

        return redirect('permissions')->with('success', 'Permissão atualizada com sucesso!');
    }


    public function store(Request $request){

        if( !isset($request->description) ){
            $data = $request->all();
            $name = $data['name'];

            $data['name'] = $name.".index";
            $data['description'] = "Visualizar index de ".$name;
            Permission::create($data);

            $data['name'] = $name.'.create';
            $data['description'] = "Visualizar formulário de incluir ".$name;
            Permission::create($data);

            $data['name'] = $name.'.edit';
            $data['description'] = "Visualizar formulário de editar ".$name;
            Permission::create($data);

            $data['name'] = $name.'.show';
            $data['description'] = "Visualizar detalhes de ".$name;
            Permission::create($data);

            $data['name'] = $name.'.store';
            $data['description'] = "Incluir registro de ".$name;
            Permission::create($data);

            $data['name'] = $name.'.update';
            $data['description'] = "Alterar registro de ".$name;
            Permission::create($data);

            $data['name'] = $name.'.destroy';
            $data['description'] = "Excluir registro de ".$name;
            Permission::create($data);

        }else{
            Permission::create($request->all());
        }

        return redirect('permissions')->with('success', 'Permissão inserida com sucesso!');
    }

    public function destroy($id){

        $permission = Permission::find($id);
        $permission->delete();

        return redirect('permissions')->with('success', 'Permissão deletada com sucesso!');
    }

    public function permissionByRoute(){
        $allRoutes = \Route::getRoutes()->get();
        //dd($allRoutes);
        foreach ($allRoutes as $route) {
            if(isset($route->action['as'])){
            $name = explode('.', $route->action['as']);

            if(count($name) > 1){
                if($name[1]=='index'){ 
                    $data['name'] = $name[0].".index";
                    $data['description'] = "Visualizar index de ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='create'){ 
                    $data['name'] = $name[0].'.create';
                    $data['description'] = "Visualizar formulário de incluir ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='edit'){    
                    $data['name'] = $name[0].'.edit';
                    $data['description'] = "Visualizar formulário de editar ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='show'){  
                    $data['name'] = $name[0].'.show';
                    $data['description'] = "Visualizar detalhes de ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='store'){ 
                    $data['name'] = $name[0].'.store';
                    $data['description'] = "Incluir registro de ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='store'){ 
                    $data['name'] = $name[0].'.update';
                    $data['description'] = "Alterar registro de ".$name[0];
                    Permission::create($data);
                }
                if($name[1]=='store'){ 
                    $data['name'] = $name[0].'.destroy';
                    $data['description'] = "Excluir registro de ".$name[0];
                    Permission::create($data);
                }
            }else{
                //dd($name);
                $data['name'] = $name[0];
                $data['description'] = $name[0];
                Permission::create($data);
            }
            
        }else{
            //dd($route);
        }
        }
        
        return redirect('permissions')->with('success', 'Permissões geradas com sucesso!');
    }
}
?>
