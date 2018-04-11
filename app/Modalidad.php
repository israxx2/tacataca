<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    use SoftDeletes;

    protected $table = 'modalidades';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //RELACION 1:N CON LOS EVENTOS
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'modalidad_id');
    }
    
}
