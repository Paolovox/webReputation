<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    protected $table ='links';

    protected $fillable = ['url', 'title', 'status', 'google_position', 'google_page', 'dossier_id'];

    /**
     * Link status enum
     * @var array
     */
    public static $status = ['removed' =>'Rimosso', 'online' => 'Online'];

    public function dossier()
    {
        return $this->belongsTo('App\Dossier', 'dossier_id');
    }

    public static function remove($ids){
        $links = self::findMany($ids);
        foreach ($links as $link){
            $link->status = 'removed';
            $status = $link->save();
        }
        return $status;
    }

    public function isOn(){
        return $this->status === 'online';
    }

}
