<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin
         $admin = User::create([
            'name' => 'Administrador',
            'last_name' => 'Prueba1',
            'email' => 'admin@platformdev.com',
            'password' => bcrypt('Adminitr@d0r!2025'),
            'phone' => '3002314578'
        ]);
        $admin->assignRole('administrador');

        // Moderador
        $moderador = User::create([
            'name' => 'Moderador',
            'last_name' => 'Prueba2',
            'email' => 'moderador@platformdev.com',
            'password' => bcrypt('Moder@dor!2025'),
            'phone' => '3001234579'
        ]);
        $moderador->assignRole('moderador');

        // Usuario
        $user = User::create([
            'name' => 'Usuario',
            'last_name' => 'Prueba3',
            'email' => 'user@platformdev.com',
            'password' => bcrypt('Usu@rio!2025'),
            'phone' => '3003214580'
        ]);
        $user->assignRole('usuario');
    }
}