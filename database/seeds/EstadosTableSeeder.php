<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('estados')->delete();
        
        \DB::table('estados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'RS',
            ),
            1 => 
            array (
                'id' => 2,
                'nome' => 'SP',
            ),
        ));
        
        
    }
}