<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cidade extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = [
        'nome', 'img_cidade', 'estado_id',
    ];

    public function pessoa(){
        return $this->hasOne(Pessoa::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
