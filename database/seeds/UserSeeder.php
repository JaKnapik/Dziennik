<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'Maciej',
//            //'email' => 'maciejkna470@gmail.com',
//            'password' => bcrypt('admin'),
//            'surname' => 'Knapik',
//            'pesel' => '97102504673',
//            'editorID' => 1,
//            'role' => 'admin',
//            'temp' => 0,
//        ]);

        DB::table('users')->insert([
            'name' => 'Sławosz2',
            //'email' => 'maciejkna470@gmail.com',
            'password' => bcrypt('user'),
            'surname' => 'Gała2',
            'pesel' => '99999999998',
            'editorID' => 1,
            'role' => 'user',
            'temp' => 0,
        ]);
    }
}
