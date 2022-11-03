<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  use HasFactory;

  protected $fillable = [
    'nome',
    'descricao',
    'imagem',
    'quantidade',
    'preco',
    'categoria_id'
  ];

  public function categoria()
  {
    return $this->belongsTo(Categoria::class);
  }
}
