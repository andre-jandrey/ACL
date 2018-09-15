<?php
namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Westsoft\Acl\Models\ProfilePermissions;
use Westsoft\Acl\Models\Profile;
use Westsoft\Acl\Models\Permission;

class ProfilePermissionsController extends Controller
{
    public function index(){

        $profile_permissions = ProfilePermissions::with('permission', 'profile')->get();

        return view('acl::profile_permissions.index', compact('profile_permissions'));
    }

    public function show($id){

        $profile_permission = ProfilePermissions::find($id);
        if( !$profile_permission ) {
            return back()->withErrors('Profile permissions não encontrado.');
        }

        return view('acl::profile_permissions.show', compact('profile_permission'));
    }

    public function create(){
        $profiles = Profile::all();
        $permissions = Permission::all();

        return view('acl::profile_permissions.create-edit', compact('profiles', 'permissions'));
    }

    public function edit($id){

        $profile_permission = ProfilePermissions::find($id);
        if( !$profile_permission ) {
            return back()->withErrors('Profile permissions não encontrado.');
        }

        return view('acl::profile_permissions.create-edit', compact('profile_permission'));
    }

    public function update(Request $request, $id){

        $profile_permission = ProfilePermissions::find($id);
        $profile_permission->update($request->all());

        return redirect('profile_permissions')->with('success', 'Atualizado com sucesso!');
    }

    public function store(Request $request){

        $data = $request->all();

        foreach($data["permissions_id"] as $permission){
            $profile_permissions = ProfilePermissions::create([
                'profiles_id' => $data['profiles_id'],
                'permissions_id' => $permission,
            ]);
        }

        return redirect('profile_permissions')->with('success', 'Inserido com sucesso!');
    }

    public function destroy($id){

        $profile_permission = ProfilePermissions::find($id);
        $profile_permission->delete();

        return redirect('profile_permissions')->with('success', 'Deletado com sucesso!');
    }

}
?>
