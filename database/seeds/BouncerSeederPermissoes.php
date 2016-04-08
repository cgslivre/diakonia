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

        $userAdmin = App\User::find(1);
        $userAdmin->assign('role-user-admin');

    }
}
