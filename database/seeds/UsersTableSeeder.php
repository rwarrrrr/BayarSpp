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
        \App\Petugas::create([
        	'id_petugas'  => 1,
        	'username' => 'admin',
        	'password'  => bcrypt('admin'),
        	'nama_petugas' => 'admin',
        	'level' => 'admin'
		]);
    }
}
