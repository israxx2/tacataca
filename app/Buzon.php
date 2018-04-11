<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    protected $table = 'buzones';

    protected $fillable = [
        'user_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    //RELACION 1:1 CON EL USUARIO
    public function user()
	{
	    return $this->belongsTo('App\User', 'user_id');
	}

    //RELACION 1:N CON LAS INVITACIONES
    public function invitaciones()
    {
        return $this->hasMany('App\Invitaciones', 'buzon_id');
    }
}
