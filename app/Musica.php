<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Musica extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'nome',
    ];

    public function pessoa(){
        return $this->belongsToMany(Pessoa::class, 'pessoas_musicas');
    }
}
