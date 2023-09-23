<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "vehiculo";

    public function Transporta() {
        return $this -> hasMany(VehiculoTransporta::class);
    }

    public function ViajeAsignado() {
        return $this -> belongsToMany(ViajeAsignado::class, "vehiculo_id", "viaje_id");
    }
}
