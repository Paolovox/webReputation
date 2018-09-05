<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    protected $table = "tickets";

    protected $fillable = ["id", "parent_id", "oggetto", "messaggio", "status", "dossier_id"];

    public static $status = ['open' =>'Aperto', 'closed' => 'Concluso'];

    public function dossier()
    {
        return $this->belongsTo('App\Dossier', 'dossier_id');
    }
}
