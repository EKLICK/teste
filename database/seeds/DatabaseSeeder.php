<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UsersTableSeeder::class);
        $this->call(AuditsTableSeeder::class);
        $this->call(CidadesTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(PessoasTableSeeder::class);
        $this->call(PessoasMusicasTableSeeder::class);
        $this->call(ProfissoesTableSeeder::class);
    }
}
