<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas_salud";
    protected $fillable = ['nombre','municipio','provincia'];

    public function consultorios(){
        return $this->hasMany('App\Consultorio','nombre_area','nombre');
    }
}
