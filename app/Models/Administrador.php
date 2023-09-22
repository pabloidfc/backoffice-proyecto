<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrador extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "administrador";

    public function Usuario() {
        return $this -> belongsTo(User::class);
    }
}