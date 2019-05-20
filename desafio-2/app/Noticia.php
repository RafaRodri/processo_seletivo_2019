<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['id', 'categoria', 'titulo', 'imagem', 'texto', 'data_formatada', 'url'];
}
