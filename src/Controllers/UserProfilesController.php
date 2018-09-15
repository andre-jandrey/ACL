<?php

namespace Westsoft\Acl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Westsoft\Acl\Models\UserProfiles;
use Westsoft\Acl\Models\Profile;


class UserProfilesController extends Controller
{
    public function index(){

        $user_profiles = UserProfiles::with('user','profile')->get();

        return view('acl::user_profiles.index', compact('user_profiles'));
    }

    public function show($id){

        $user_profiles = UserProfiles::find($id);
        if( !$user_profiles ) {
            return back()->withErrors('User Profile não encontrado.');
        }

        return view('acl::user_profiles.show', compact('user_profile'));
    }

    public function create(){

        $profiles = Profile::all();
        $users    = User::all();
        return view('acl::user_profiles.create-edit', compact('users', 'profiles'));
    }

    public function edit($id){

        $user_profiles = UserProfiles::find($id);
        if( !$user_profiles ) {
            return back()->withErrors('User Profile não encontrado.');
        }

        return view('acl::user_profiles.create-edit', compact('user_profiles'));
    }

    public function update(UserProfilesRequest $request, $id){

        $user_profiles = UserProfiles::find($id);
        $user_profiles ->update($request->all());

        return redirect('user_profiles')->with('success', 'Atualizado com sucesso!');
    }


    public function store(UserProfilesRequest $request){

        $user_profiles = UserProfiles::create($request->all());

        return redirect('user_profiles')->with('success', 'Inserido com sucesso!');
    }

    public function destroy($id){

        $user_profiles = UserProfiles::find($id);
        $user_profiles->delete();

        return redirect('profile_permissions')->with('success', 'Deletado com sucesso!');
    }

}
?>
