<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Lotes() {
        return $this -> hasMany(Lote::class);
    }

    public function Ubicacion() {
        return $this -> hasOne(Ubicacion::class);
    }

    public function Telefono() {
        return $this -> hasMany(Telefono::class);
    }

    public function Transportista() {
        return $this -> hasOne(Transportista::class);
    }

    public function Administrador() {
        return $this -> hasOne(Administrador::class);
    }

    public function Funcionario() {
        return $this -> hasOne(Funcionario::class);
    }
}
