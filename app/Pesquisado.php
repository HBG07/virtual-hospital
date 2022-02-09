<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesquisado extends Model
{
    protected $primaryKey = "CI";
    protected $keyType = "string";
    protected $table = "pesquisados";
    protected $fillable = ['CI','nombre','primer_apellido','segundo_apellido'];

    public function consultorio(){
        return $this->belongsTo('App\Consultorio','numero_consultorio','numero');
    }
    public function pesquisas(){
        return $this->hasMany('App\Pesquisa','CI_pesquisado','CI');
    }
}
