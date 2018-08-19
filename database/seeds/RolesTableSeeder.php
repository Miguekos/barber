<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++){
            if ($i == 0){
                $nombre = "barbero";
            }elseif ($i == 1){
                $nombre = "encargado";
            }
            $roles = \App\Roles::create ([
                'nombre' => $nombre,
            ]);
        }
    }
}
