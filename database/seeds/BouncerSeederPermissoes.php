<?php

use Illuminate\Database\Seeder;

class BouncerSeederPermissoes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Papéis para seção Usuário
        Bouncer::allow('role-user-users')->to([
            'user-list',
            'user-view'
        ]);

        Bouncer::allow('role-user-manage')->to([
            'user-list',
            'user-view',
            'user-edit',
            'user-create'
        ]);

        Bouncer::allow('role-user-admin')->to([
            'user-list',
            'user-view',
            'user-edit',
            'user-create',
            'user-remove',
            'user-permissions'
        ]);

        // Papéis para seção Membro
        Bouncer::allow('role-membro-admin')->to([
            'membro-list',
            'membro-create',
            'membro-edit',
            'membro-remove',
            'membro-grupo-create',
            'membro-grupo-edit',
            'membro-grupo-remove',
            'membro-regiao-create',
            'membro-regiao-remove'
        ]);

        Bouncer::allow('role-membro-lider')->to([
            'membro-list',
            'membro-create',
            'membro-edit',
            'membro-remove'
        ]);

        Bouncer::allow('role-membro-user')->to([
            'membro-list'
        ]);

        // Papéis para seção Evento
        Bouncer::allow('role-evento-admin')->to([
            'evento-view',
            'evento-edit',
            'evento-remove'
        ]);

        Bouncer::allow('role-evento-users')->to([
            'evento-view'
        ]);

        // Papéis para Seção Geral
        Bouncer::allow('role-geral-admin')->to([
            'geral-create-local',
            'geral-edit-local',
            'geral-remove-local'
        ]);

        // Papéis para Seção Material
        Bouncer::allow('role-material-curiculo-user')->to([
            'material-curriculo-view'
        ]);

        Bouncer::allow('role-material-curiculo-admin')->to([
            'material-curriculo-view',
            'material-curriculo-edit',
        ]);



        $userAdmin = App\User::find(1);
        $userAdmin->assign('role-user-admin');
        $userAdmin->assign('role-membro-admin');
        $userAdmin->assign('role-evento-admin');
        $userAdmin->assign('role-geral-admin');
        $userAdmin->assign('role-material-curiculo-admin');

    }
}
