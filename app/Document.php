<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $table ='documents';
    protected $fillable = ['title', 'filename', 'original_filename', 'dossier_id'];

    public function dossier()
    {
        return $this->belongsTo('App\Dossier', 'dossier_id');
    }
}
