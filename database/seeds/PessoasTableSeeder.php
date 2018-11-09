<?php

use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pessoas')->delete();
        
        \DB::table('pessoas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'Oscar',
                'cpf' => '12121212121',
                'cidade_id' => 5,
                'profissao_id' => 3,
                'deleted_at' => NULL,
                'created_at' => '2018-11-09 14:01:49',
                'updated_at' => '2018-11-09 14:01:49',
            ),
        ));
        
        
    }
}