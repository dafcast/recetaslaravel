<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Evento de creación de usuario
     */

    protected static function booted(){


        // parent::boot();

        static::created(function ($user){
            $user->perfil()->create();
        });
    }


    /**
     * Relación 1:n de un Usuario a muchas recetas
     */

    public function recetas(){
        return $this->hasMany(Receta::class);
    }


    /**
     * Relación 1:1 de Usuario a Perfil
     */

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }
}
