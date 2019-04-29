<?php
namespace Westsoft\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfiles extends Model
{

    protected $table = "user_profiles";

    protected $fillable = [
        'profiles_id', 
        'user_id'
    ];

    public function profile() {
        return $this->belongsTo('Westsoft\Acl\Models\Profile', 'profiles_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
?>
