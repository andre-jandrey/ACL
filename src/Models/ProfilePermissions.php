<?php
namespace Westsoft\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePermissions extends Model
{

    protected $table = "profile_permissions";

    protected $fillable = [
        'profiles_id', 
        'permissions_id'
    ];

    public function profile() {
        return $this->belongsTo('Westsoft\Acl\Models\Profile', 'profiles_id');
    }

    public function permission() {
        return $this->belongsTo('Westsoft\Acl\Models\Permission', 'permissions_id');
    }
}
?>
