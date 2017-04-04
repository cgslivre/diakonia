<?php

use Illuminate\Database\Seeder;

class BouncerSeederUpdateTitle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuários        
        DB::table('roles')->where('name','role-user-users')
            ->update(array('title'=>'Padrão','scope'=>'Usuário','nivel'=>1));
        DB::table('roles')->where('name','role-user-manage')
            ->update(array('title'=>'Gerente','scope'=>'Usuário','nivel'=>2));
        DB::table('roles')->where('name','role-user-admin')
            ->update(array('title'=>'Administrador','scope'=>'Usuário','nivel'=>3));

        DB::table('abilities')->where('name','user-list')->update(array('title'=>'Listar Usuários'));
        DB::table('abilities')->where('name','user-view')->update(array('title'=>'Ver Usuário'));
        DB::table('abilities')->where('name','user-edit')->update(array('title'=>'Editar Usuário'));
        DB::table('abilities')->where('name','user-remove')->update(array('title'=>'Remover Usuário'));
        DB::table('abilities')->where('name','user-create')->update(array('title'=>'Criar Usuário'));
        DB::table('abilities')->where('name','user-permissions')
            ->update(array('title'=>'Alterar Permissões Usuário'));

        // Membros
        DB::table('roles')->where('name','role-membro-user')
            ->update(array('title'=>'Padrão','scope'=>'Membros','nivel'=>1));
        DB::table('roles')->where('name','role-membro-lider')
            ->update(array('title'=>'Líder','scope'=>'Membros','nivel'=>2));
        DB::table('roles')->where('name','role-membro-admin')
            ->update(array('title'=>'Administrador','scope'=>'Membros','nivel'=>3));

        DB::table('abilities')->where('name','membro-list')
            ->update(array('title'=>'Ver Membros'));
        DB::table('abilities')->where('name','membro-create')
            ->update(array('title'=>'Adicionar Membro'));
        DB::table('abilities')->where('name','membro-edit')
            ->update(array('title'=>'Editar Membo'));
        DB::table('abilities')->where('name','membro-remove')
            ->update(array('title'=>'Remover Membro'));
        DB::table('abilities')->where('name','membro-grupo-create')
            ->update(array('title'=>'Adicionar Grupo Caseiro'));
        DB::table('abilities')->where('name','membro-grupo-edit')
            ->update(array('title'=>'Editar Grupo Caseiro'));
        DB::table('abilities')->where('name','membro-grupo-remove')
            ->update(array('title'=>'Remover Grupo Caseiro'));
        DB::table('abilities')->where('name','membro-regiao-create')
            ->update(array('title'=>'Adicionar Região'));
        DB::table('abilities')->where('name','membro-regiao-remove')
            ->update(array('title'=>'Remover Região'));

    }
}
