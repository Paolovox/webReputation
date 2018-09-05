<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Keyword
 * @package App
 * @property int id
 * @property string keyword
 */
class Keyword extends Model
{
  use SoftDeletes;
  protected $table = "keywords";

}
