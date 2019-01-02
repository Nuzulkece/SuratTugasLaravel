<?php

use Illuminate\Database\Seeder;
use App\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Admin',
        	'email' => 'admin@sru.com',
        	'password' => '$2y$10$gPvzbPJa3g/ioAOalWpVxeK1GHF6JZJIBsuXHn8rBtZ.1QwJo.cq6'
        ]);
    }
}
