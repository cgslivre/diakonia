<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateAdmin extends Command
{
    const USER_ROLE_ADMIN = 'role-user-admin';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment("Script para criação do usuário administrador");

        $users = User:: whereIs(self::USER_ROLE_ADMIN)->get();
        
        if( $users->count() > 0 ){
            $this->error('Já existe um ou mais administradores cadastrados');
            return;
        }        
        
        $email = $this->ask('Email do administrador:');
        $users = User:: where('email', $email)->get();
        if( $users->count() > 0 ){
            $user = $users->first();
            $this->comment('Email já utilizado por outro usuário');
            if ($this->confirm('Deseja dar permissão de administrador para o usuário '. $user->name.'?')) {
                $user->assign(self::USER_ROLE_ADMIN);
                $this->comment('Usuário ' . $user->name . ' agora é administrador');
            } else{
                $this->comment('Permissão não concedida');
            }
            return;
        }        
        
        $name = $this->ask('Nome do administrador:');        
        $telefone = $this->ask('Telefone do administrador:');
        $password = $this->secret('Senha:');
        
        
        $user = new User();
        $user->name = $name;
        $user->telefone = $telefone;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();
        
        $user->assign(self::USER_ROLE_ADMIN);
        
        $this->comment('Usuário ' . $user->name . ' criado.');

    }
}
