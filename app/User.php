<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public static function getLawyers()
    {
        return User::whereHas('roles', function($q){
                        $q->where('name', 'lawyer');
                })->get();
    }

    public static function findLawyer($id){
        $user = self::findOrFail($id);
        if ($user->hasRole('lawyer'))
            return $user;
        return FALSE;
    }

    public static function addLawyer($name, $email){
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = self::generatePassword();
        $user->save();
        $user->roles()->attach(Role::where('name', 'lawyer')->first());
        return $user;
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function dossier(){
        return $this->hasMany('App\Dossier', 'lawyer_id');
    }

    public static function generatePassword()
    {
        return bcrypt(str_random(35));
    }

}
