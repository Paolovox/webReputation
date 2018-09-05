<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dossier extends Model
{
    use SoftDeletes;
    protected $table ='dossiers';
    protected $fillable = ["id","number", 'client_id'];



    public static function findByNumber($number){
        return self::where('number', $number)->firstOrFail();;
    }

    public function client(){
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function lawyer(){
        return $this->belongsTo('App\User', 'lawyer_id');
    }

    public function links(){
        return $this->hasMany('App\Link');
    }

    public function documents(){
        return $this->hasMany('App\Document');
    }

    public function tickets(){
        return $this->hasMany('App\Ticket');
    }

    public function findByLawyer($id){
        return self::where('lawyer_id', $id)->get();
    }

    public static function getNumber(){
        return ++self::all()->last()->number;
    }

    public function isOwner(User $user){
        return $this->lawyer->id === $user->id;
    }


}
