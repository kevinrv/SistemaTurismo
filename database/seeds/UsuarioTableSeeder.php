<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'email' => 'admin@gmail.com',
            'pass' => bcrypt('admin'),
            'estado' =>'ACTIVO',
        ]);
    }
}
