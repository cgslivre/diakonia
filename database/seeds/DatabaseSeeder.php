<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(SituacaoRetiroSeeder::class);
        $this->call(LocalSeed::class);

        $this->call(GrupoInscricaoSeeder::class);
        $this->call(BouncerSeederPermissoes::class);
        $this->call(MusicaStaffSeeder::class);
        $this->call(RelacionamentosSeeder::class);
        $this->call(RegioesSeeder::class);
        $this->call(ConsultaMembrosSeeder::class);
        //Model::reguard();
    }
}
