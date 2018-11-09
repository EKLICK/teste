<?php

use Illuminate\Database\Seeder;

class ProfissoesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profissoes')->delete();
        
        \DB::table('profissoes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'Cozinheiro',
                'descricao' => 'Cozinheiro teste',
                'img_profissao' => 'img/img_profissoes/imagem_6301.jpeg',
                'created_at' => '2018-11-09 13:28:39',
                'updated_at' => '2018-11-09 13:28:39',
            ),
            1 => 
            array (
                'id' => 2,
                'nome' => 'Engenheiro',
                'descricao' => 'Engenheiro teste',
                'img_profissao' => 'img/img_profissoes/imagem_3384.jpeg',
                'created_at' => '2018-11-09 13:28:55',
                'updated_at' => '2018-11-09 13:28:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nome' => 'Programador',
                'descricao' => 'Programador teste',
                'img_profissao' => 'img/img_profissoes/imagem_4144.jpeg',
                'created_at' => '2018-11-09 13:29:11',
                'updated_at' => '2018-11-09 13:29:11',
            ),
            3 => 
            array (
                'id' => 4,
                'nome' => 'Médico',
                'descricao' => 'Médico teste',
                'img_profissao' => 'img/img_profissoes/imagem_1554.jpeg',
                'created_at' => '2018-11-09 13:29:34',
                'updated_at' => '2018-11-09 13:29:34',
            ),
            4 => 
            array (
                'id' => 5,
                'nome' => 'Atendente',
                'descricao' => 'Atendente teste',
                'img_profissao' => 'img/img_profissoes/imagem_2758.jpeg',
                'created_at' => '2018-11-09 13:29:46',
                'updated_at' => '2018-11-09 13:29:46',
            ),
        ));
        
        
    }
}