<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Platform
 * @package App
 * @property int id
 * @property string platform
 */
class Platform extends Model
{
    use SoftDeletes;
    protected $table = "platforms";

    function searches(){
        return $this->hasMany('App\Search',  "platform_id","id");
    }

    /**
     * @return array [id => platform]
     */
    public static function getSelect() {
        $select_array = array();
        foreach (self::all() as $platform) {
            $select_array[$platform->id] = $platform->platform;
        }
        return $select_array;
    }

    public static function exists(string $platform) {
        return self::whereRaw('LOWER(`platform`) LIKE ? ', [trim(strtolower($platform)).'%'])->exists();
    }
}
