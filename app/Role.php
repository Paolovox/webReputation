<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    /**
     * Get users with a certain role
     */
   public function users(){
        return $this->belongsToMany('Role', 'role_user');
   }
}
