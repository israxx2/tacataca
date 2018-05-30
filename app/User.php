<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'carrera_id', 'equipo_id', 'buzon_id', 'nombres', 'apellidos', 'nick', 'c_nick', 'elo', 'v_duelos_1v1', 'v_torneos_1v1', 'email', 'tipo', 'password', 'juegos_totales_1v1', 'torneos_ganados', 'goles_totales', 'goles_contra'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

    //RELACION N:1 CON LA CARRERA
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'carrera_id');
    }

    //RELACION N:1 CON EL EQUIPO
    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'equipo_id');
    }

    //RELACION 1:1 CON EL BUZON
    public function buzon()
    {
        return $this->hasOne('App\Buzon', 'user_id');
    }

    //RELACION N:M CON EL PARTIDO
    public function partidosAlbitrados()
    {
        return $this->hasMany('App\Partido', 'albitro_id');
    }

    //RELACION 1:N CON LAS INVITACIONES
    public function invitaciones()
    {
        return $this->hasMany('App\Invitaciones', 'user_id');
    }

    //RELACION 1:N CON LOS EVENTOS
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'user_id');
    }


    //RELACION N:M CON LOS PARTIDOS
    public function partidos()
    {
        return $this->belongsToMany('App\Partido', 'detallePartidoSingle', 'user_id', 'partido_id')
        ->withPivot('goles', 'resultado', 'elo', 'elo_anterior')
        ->withTimestamps();
    }

    //RELACION N:M CON LOS EVENTOS
    public function torneos()
    {
        return $this->belongsToMany('App\Evento', 'inscripcionTorneo', 'user_id', 'evento_id')
        ->withTimestamps();
    }
}
