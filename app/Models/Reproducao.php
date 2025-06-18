<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reproducao extends Model
{
    use HasFactory;

    protected $fillable = [
        'musica_id',
        'data_reproducao',
    ];

    // Uma reprodução pertence a uma música
    public function musica()
    {
        return $this->belongsTo(Musica::class);
    }
}
