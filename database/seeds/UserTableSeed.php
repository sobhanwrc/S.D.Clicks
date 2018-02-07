<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Sobhan Das',
            'email' => 'sobhandas30@gmail.com',
            'password' => bcrypt('sobhan123'),
        ]);
    }
}
