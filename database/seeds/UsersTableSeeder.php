<?php

use App\User;
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
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'rol' => 'encargado',
            'barber' => '0',
            'barber_id' => '0',
            'porcent' => '0',
        ]);
    }
}
