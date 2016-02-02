<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Marcos Freire',
          'email' => 'marcosdefontes@gmail.com',
          'password' => bcrypt(env('PASS_USER_ONE')),
          'isAdmin' => true
      ]);
    }
}
