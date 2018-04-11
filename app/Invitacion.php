<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitacion extends Model
{
    use SoftDeletes;
    protected $table = 'invitaciones';

    protected $fillable = [
        'user_id', 'buzon_id', 'receptor', 'descripcion',
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

    //RELACION N:1 CON EL BUZON
    public function buzon()
    {
        return $this->belongsTo('App\Buzon', 'buzon_id');
    }
}
