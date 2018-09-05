<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Client extends Model{

    use SoftDeletes;
    protected $table ='clients';

    protected $fillable = ['name', 'lawyer_id', 'user_id',];

    public static function findAll(User $user){
        if($user->hasRole('admin'))
            return self::all();
        else if ($user->hasRole('lawyer'))
            return self::where('lawyer_id', $user->id)->get();
        return [];
    }

    public static function findDossier($id){
        return self::find($id)->dossier;
    }


    public function dossier(){
        return $this->hasOne('App\Dossier' );
    }

    public static function search($name, User $lawyer){
        return DB::table('clients')
            ->where('name', 'like','%'.$name.'%')
            ->join('dossiers','dossiers.client_id', '=', 'clients.id')
            ->where('dossiers.lawyer_id', $lawyer->id)
            ->get(['clients.id','clients.name']);
    }


}
