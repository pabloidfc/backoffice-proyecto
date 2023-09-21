<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Funcionario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "funcionario";

    protected $fillable = [
        "almacen_id",
        "empresa_id",
        "tipo"
    ];

    public function Usuario() {
        return $this -> belongsTo(User::class);
    }

    public function Empresa() {
        return $this -> belongsTo(Cliente::class, "empresa_id");
    }
}
