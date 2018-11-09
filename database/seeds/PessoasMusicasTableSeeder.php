<?php

use Illuminate\Database\Seeder;

class PessoasMusicasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pessoas_musicas')->delete();
        
        \DB::table('pessoas_musicas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pessoa_id' => 1,
                'musica_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'pessoa_id' => 1,
                'musica_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'pessoa_id' => 1,
                'musica_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}