<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Profissao extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $table = "profissoes";

    protected $fillable = [
        'nome', 'descricao', 'img_profissao',
    ];

    //nome da funcao + depois do return + nome do modelo
    public function pessoa(){
        return $this->hasMany(Pessoa::class);
    }

}
