<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pessoa extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    //protected $table = "pessoas";

    protected $fillable = [
        'nome','cpf','cidade_id', 'profissao_id', 'deleted_at',
    ];

    //depois do return + nome da funcao + nome do modelo
    public function profissao(){
        return $this->belongsTo(Profissao::class);
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function musica(){
        return $this->belongsToMany(Musica::class, 'pessoas_musicas');
    }
}
