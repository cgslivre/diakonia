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
          'name' => env('NAME_USER_ONE'),
          'email' => env('EMAIL_USER_ONE'),
          'telefone' => env('TEL_USER_ONE'),
          'password' => bcrypt(env('PASS_USER_ONE')),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
    }
}
