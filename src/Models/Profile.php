<?php
namespace Westsoft\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_profiles');
    }

    public function permissions()
    {
        return $this->belongsToMany('Westsoft\Acl\Models\Permission', 'profile_permissions');
    }

}
?>
