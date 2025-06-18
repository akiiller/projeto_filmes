<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
   use HasFactory;

    protected $fillable = [
        'titulo',
        'artista',
        'album',
        'genero',
        'imagem',
    ];

    // Uma música pode ter muitas reproduções
    public function reproducoes()
    {
        return $this->hasMany(Reproducao::class);
    }
}
