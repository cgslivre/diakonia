<?php

use Illuminate\Database\Seeder;
use App\User;

class ConsultaMembrosSeeder extends Seeder
{
    const USER_ROLE_ADMIN = 'role-user-admin';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Ajustar para pegar o primeiro administrador do sistema (se houver)        
        $users = User:: whereIs(self::USER_ROLE_ADMIN)->get();
        if( $users->count() == 0 ){
            return;
        }
        $idUser = $users->first()->id;

        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-discipuladores',
            'titulo' => 'Todos os discipuladores',
            'tem_discipulos' => 'S',
            'consulta_publica' => true,
            'created_by' => $idUser,
            'modified_by' => $idUser
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos',
            'titulo' => 'Todos os membros',            
            'consulta_publica' => true,
            'created_by' => $idUser,
            'modified_by' => $idUser
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-que-nao-tem-discipuladores',
            'titulo' => 'Sem discipulador(a) (acima de 12 anos)',
            'tem_discipulador' => 'N',
            'consulta_publica' => true,
            'idade_minima' => 12,
            'created_by' => $idUser,
            'modified_by' => $idUser
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'todos-os-que-nao-sao-discipuladores',
            'titulo' => 'Todos os que não são discipuladores (acima de 12 anos)',
            'tem_discipulos' => 'N',
            'consulta_publica' => true,
            'idade_minima' => 12,
            'created_by' => $idUser,
            'modified_by' => $idUser
        ]]);
        DB::table('consulta_membros')->insert([
        [
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' =>  \Carbon\Carbon::now(),
            'slug' => 'criancas-3-a-11-anos',
            'titulo' => 'Crianças (3 a 11 anos)',
            'idade_minima' => 3,
            'idade_maxima' => 11,
            'consulta_publica' => true,
            'created_by' => $idUser,
            'modified_by' => $idUser
        ]
      ]);
    }
}
