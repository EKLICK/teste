<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'cidade' => '$2y$10$DsrVcrKwaOd2G4XSDgybJ.1YwjAYpkWuPq2xXF5SGhzjxkY8aAusm',
                'password' => '$2y$10$8n8WgioKJOPsOKXI36HhMeaGPtoKndY7HFjGLSB1MdsvRLqMA6PMi',
                'remember_token' => NULL,
                'created_at' => '2018-11-09 13:24:59',
                'updated_at' => '2018-11-09 13:24:59',
            ),
        ));
        
        
    }
}