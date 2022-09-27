<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinamento extends Model
{
    use HasFactory;

    protected $table = 'treinamentos';

    protected $fillable = [
        'nome',
        'descricao',
        'ativo'
    ];
}
