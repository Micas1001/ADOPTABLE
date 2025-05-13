<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    protected $fillable = ['animal_id', 'nome', 'email', 'telefone', 'mensagem'];

}
