<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partido extends Model
{
    use SoftDeletes;
    protected $table = 'partidos';

    protected $fillable = [
        'evento_id', 'albitro_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //RELACION N:1 CON EL ALBITRO
    public function albitro()
    {
        return $this->belongsTo('App\User', 'albitro_id');
    }

    //RELACION N:1 CON EL EVENTO
    public function evento()
    {
        return $this->belongsTo('App\Evento', 'evento_id');
    }
    
    //RELACION N:M CON LOS USUARIOS
    public function users()
    {
        return $this->belongsToMany('App\User', 'detallePartidoSingle')
          ->withPivot('goles','resultado', 'elo')
          ->withTimestamps();
    }

    //RELACION N:M CON LOS EQUIPOS
    public function equipos()
    {
        return $this->belongsToMany('App\Equipo', 'detallePartidoDoble')
          ->withPivot('goles','resultado', 'elo')
          ->withTimestamps();
    }

}
