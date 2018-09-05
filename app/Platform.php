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

}
