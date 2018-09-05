<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Search
 * @package App
 * @property int id
 * @property int keyword_id
 * @property int platform_id
 */
class Search extends Model
{
    use SoftDeletes;
    protected $table = "searches";

    function keyword(){
        return $this->hasOne('App\Keyword', 'id', 'keyword_id');
    }

    function platform(){
        return $this->hasOne('App\Platform', 'id', 'platform_id');
    }

    function results() {
        return $this->hasMany('App\Result',  "search_id","id");
    }

    public static function exists($platform_id, $keyword_id) {
        return self::where('platform_id', $platform_id)->where('keyword_id', $keyword_id)->exists();
    }
}
