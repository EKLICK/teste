<?php

use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cidades')->delete();
        
        \DB::table('cidades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'Porto Alegre',
                'img_cidade' => 'img/img_cidades/imagem_7690.jpeg',
                'estado_id' => 1,
                'created_at' => '2018-11-09 13:26:48',
                'updated_at' => '2018-11-09 13:26:48',
            ),
            1 => 
            array (
                'id' => 2,
                'nome' => 'Novo Hamburgo',
                'img_cidade' => 'img/img_cidades/imagem_2176.jpeg',
                'estado_id' => 1,
                'created_at' => '2018-11-09 13:26:59',
                'updated_at' => '2018-11-09 13:26:59',
            ),
            2 => 
            array (
                'id' => 3,
                'nome' => 'São Leopoldo',
                'img_cidade' => 'img/img_cidades/imagem_6666.jpeg',
                'estado_id' => 1,
                'created_at' => '2018-11-09 13:27:12',
                'updated_at' => '2018-11-09 13:27:12',
            ),
            3 => 
            array (
                'id' => 4,
                'nome' => 'Pelotas',
                'img_cidade' => 'img/img_cidades/imagem_9725.jpeg',
                'estado_id' => 1,
                'created_at' => '2018-11-09 13:27:26',
                'updated_at' => '2018-11-09 13:27:26',
            ),
            4 => 
            array (
                'id' => 5,
                'nome' => 'São Paulo',
                'img_cidade' => 'img/img_cidades/imagem_9308.jpeg',
                'estado_id' => 2,
                'created_at' => '2018-11-09 13:27:41',
                'updated_at' => '2018-11-09 13:27:41',
            ),
            5 => 
            array (
                'id' => 6,
                'nome' => 'Osasco',
                'img_cidade' => 'img/img_cidades/imagem_7929.jpeg',
                'estado_id' => 2,
                'created_at' => '2018-11-09 13:27:57',
                'updated_at' => '2018-11-09 13:27:57',
            ),
        ));
        
        
    }
}