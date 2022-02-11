<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    // protected $primaryKey = ['CI_pesquisado','fecha'];
    protected $table = "pesquisas";
    protected $fillable = [
        'CI_pesquisado',
        'fecha',
        'tipo_pesquisador',
        'anciano_solo',
        'app',
        'encamado',
        'VIH',
        'diambulante', // deambulante
        'familia_riesgo',
        'embarazada',
        'puerpera',
        'contacto',
        'inmunodeprimido',
        't_salud',
        't_turismo'
    ];
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query->where('CI_pesquisado','=',$this->getAttribute('CI_pesquisado'))->where('fecha','=',$this->getAttribute('fecha'));
        return $query;
    }

    public function pesquisado(){
        return $this->belongsTo('App\Pesquisado','CI_pesquisado','CI');
    }
}
