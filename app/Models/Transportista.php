<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transportista extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "funcionario";

    public function Usuario() {
        return $this -> belongsTo(User::class);
    }
}
