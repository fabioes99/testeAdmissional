<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'attachment', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function chamados()
    {
        return $this->hasMany('App\Models\ChamadoResposta');
    }
}
