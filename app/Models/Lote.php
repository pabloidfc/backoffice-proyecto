<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lote extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "lote";

    public function Productos() {
        return $this -> hasMany(Producto::class);
    } 

    public function Almacen() {
        return $this -> belongsTo(Almacen::class, "almacen_destino");
    }

    public function Transporta() {
        return $this -> hasMany(VehiculoTransporta::class);
    }

    public function ViajeAsignado() {
        return $this -> belongsToMany(ViajeAsignado::class, "lote_id", "viaje_id");
    }

    public function Creador() {
        return $this -> belongsTo(User::class);
    }
}