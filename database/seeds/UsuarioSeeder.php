<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            "nombre"            => "Ever",
            "apellido"          => "Cifuentes",
            "telefono"      	=> 123123123,
            "email"      		=> "ever@gmail.com",
            "password"      	=> "everci",
            "estado"      		=> 1,
            "rol"		 		=> 1,
            "created_at"        => date('Y-m-d H:m:s'),
            "updated_at"        => date('Y-m-d H:m:s')
        ]);
    }
}
