<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ubicacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "ubicacion";

    public function Almacen() {
        return $this -> belongsTo(Almacen::class);
    }

    public function Usuario() {
        return $this -> belongsTo(User::class);
    }

    public function Cliente() {
        return $this -> belongsTo(Cliente::class);
    }
}