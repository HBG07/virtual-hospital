<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    protected $primaryKey = ['CI_pesquisado','fecha'];
    protected $table = "pesquisas";
    protected $fillable = [
        'CI_pesquisado',
        'fecha',
        'tipo_pesquisador',
        'anciano_solo',
        'app',
        'encamado',
        'VIH',
        'diambulante',
        'familia_riesgo',
        'embarazada',
        'puerpera',
        'contacto',
        'inmunodeprimido',
        't_salud',
        't_turismo'
    ];

    public function pesquisado(){
        return $this->belongsTo('App\Pesquisado','CI_pesquisado','CI');
    }
}
