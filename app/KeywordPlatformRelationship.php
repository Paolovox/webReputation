<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KeywordPlatformRelationship extends Model
{

  use SoftDeletes;
  protected $table = "keyword_platform_relationships";


}
