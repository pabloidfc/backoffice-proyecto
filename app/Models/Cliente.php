<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cliente";

    public function Ubicacion() {
        return $this -> hasOne(Ubicacion::class);
    }

    public function Telefono() {
        return $this -> hasMany(Telefono::class);
    }

    public function Funcionario() {
        return $this -> hasOne(Funcionario::class, "empresa_id");
    }
}
