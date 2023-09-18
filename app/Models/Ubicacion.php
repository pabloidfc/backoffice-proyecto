<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = "ubicacion";

    public function Almacen() {
        return $this -> belongsTo(Almacen::class);
    }

    public function Usuario() {
        return $this -> belongsTo(User::class);
    }
}