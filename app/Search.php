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
}
