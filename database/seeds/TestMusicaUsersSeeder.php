<?php

use Illuminate\Database\Seeder;

class TestMusicaUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => "Vitrúvio",
          'email' => "vitruvio@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Filipe Cunha",
          'email' => "filipecunha@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Maurício",
          'email' => "mauricio@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Davi Dörr",
          'email' => "davidorr@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Moisés",
          'email' => "moises@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Lucídio",
          'email' => "lucidio@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Taiana",
          'email' => "taiana@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Jeniffer",
          'email' => "jeniffer@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Débora",
          'email' => "debora@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Édina",
          'email' => "edina@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Ieda",
          'email' => "ieda@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Maria Helena",
          'email' => "maria.helena@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Ecinele",
          'email' => "ecinele@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Breno",
          'email' => "breno@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Debbie",
          'email' => "debbie@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Alexandre Calazans",
          'email' => "alexandre.calanzans@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Luís Fernando",
          'email' => "luis.fernando@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Thiago Wen",
          'email' => "thiago.wen@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "André Atadeu",
          'email' => "andre.atadeu@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Raphael Roque",
          'email' => "raphael.roque@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "André Torres",
          'email' => "andre.torres@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Filipe Lins",
          'email' => "filipe.lins@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Victor",
          'email' => "victor@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
      DB::table('users')->insert([
          'name' => "Davi Gulart",
          'email' => "davi.gulart@mail.com",
          'telefone' => "619" . mt_rand(100000, 99999999),
          'password' => bcrypt("123456"),
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
      ]);
    }
}
