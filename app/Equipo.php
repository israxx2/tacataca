<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;

    protected $table = 'equipos';

    protected $fillable = [
        'nombre','elo', 'v_duelos_2v2', 'v_torneos_2v2', 'juegos_totales_2v2',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //RELACION 1:N CON LOS USUARIOS
    public function users()
    {
        return $this->hasMany('App\User', 'equipo_id');
    }

    //RELACION N:M CON LOS PARTIDOS
    public function partidos()
    {
        return $this->belongsToMany('App\Partido', 'detallePartidoDoble', 'equipo_id', 'partido_id')
        ->withPivot('goles', 'resultado', 'elo')
        ->withTimestamps();
    }
}
