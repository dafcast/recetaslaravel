<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Dayan',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://www.google.com'
        ]);

        User::create([
            'name' => 'Ferney',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://www.facebook.com/'
        ]);

    }
}
