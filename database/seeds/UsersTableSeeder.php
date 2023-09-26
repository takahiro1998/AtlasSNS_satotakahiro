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
        //
        DB::table('users')->insert([
            ['username'=>'ユーザー',
            'mail'=>'user@test.com',
            'password'=>bcrypt('123456')]
        ]);
    }
}
