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

    /**
     * @return array [id => (platform => keyword)]
     */
    public static function getSelect() {
        $select_array = array();
        foreach (self::all() as $search) {
            $select_array[$search->id] = $search->platform->platform.' => '.$search->keyword->keyword;
        }
        return $select_array;
    }

    public static function exists($platform_id, $keyword_id) {
        return self::where('platform_id', $platform_id)->where('keyword_id', $keyword_id)->exists();
    }
}
