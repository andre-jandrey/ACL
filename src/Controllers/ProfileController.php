<?php
namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Westsoft\Acl\Models\Profile;

class ProfileController extends Controller
{
    public function index(){

        $profiles = Profile::all();
        return view('acl::profiles.index', compact('profiles'));
    }

    public function show($id){

        $profile = Profile::find($id);
        if( !$profile ) {
            return back()->withErrors('Profile não encontrada.');
        }

        return view('acl::profiles.show', compact('profile'));
    }

    public function create(){

        return view('acl::profiles.create-edit');
    }

    public function edit($id){

        $profile = Profile::find($id);
        if( !$profile ) {
            return back()->withErrors('Profile não encontrada.');
        }

        return view('acl::profiles.create-edit', compact('profile'));
    }

    public function update(Request $request, $id){

        $profile = Profile::find($id);
        $profile->update($request->all());

        return redirect('profiles')->with('success', 'Perfil atualizado com sucesso!');
    }


    public function store(Request $request){

        $profile = Profile::create($request->all());

        return redirect('profiles')->with('success', 'Perfil inserido com sucesso!');
    }

    public function destroy($id){

        $profile = Profile::find($id);
        $profile->delete();

        return redirect('profiles')->with('success', 'Perfil deletado com sucesso!');
    }

}
?>
