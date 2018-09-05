<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Result
 * @package App
 * @property int id
 * @property int search_id
 * @property string link
 * @property string status
 * @property string position
 * @property string description
 */
class Result extends Model
{
  use SoftDeletes;
  protected $table = "results";
}
