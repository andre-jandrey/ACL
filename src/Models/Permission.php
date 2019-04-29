<?php
namespace Westsoft\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name', 
        'description'
    ];

    public function profiles()
    {
        return $this->belongsToMany('Westsoft\Acl\Models\Profile', 'profile_permissions');
    }

}
?>
