<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $table = "consultorios";
    protected $fillable = ['numero','direccion'];

    public function area(){
        return $this->belongsTo('App\Area','nombre_area','nombre');
    }
    public function pesquisados(){
        return $this->hasMany('App\Pesquisado','numero_consultorio','numero');
    }
}
