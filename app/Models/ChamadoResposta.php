<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChamadoResposta extends Model
{
    use HasFactory;

    protected $fillable = ['chamado_id', 'response'];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
