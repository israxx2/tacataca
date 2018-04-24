<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
	use SoftDeletes;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre', 'user_id', 'modalidad_id', 'descripcion', 'modalidad', 'tipo', 'fecha', 'hora',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //RELACION N:1 CON EL USUARIO
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //RELACION N:1 CON LA MODALIDAD
    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad', 'modalidad_id');
    }

    //RELACION 1:N CON LOS PARTIDOS
    public function partidos()
    {
        return $this->hasMany('App\Partido', 'evento_id');
    }

    //RELACION N:M CON LOS USUARIOS
    public function jugadores()
    {
        return $this->belongsToMany('App\User', 'inscripcionTorneo')
        ->withTimestamps();
    }
}
