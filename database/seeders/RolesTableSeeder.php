<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'administrador', 'guard_name' => 'web'],
            ['name' => 'moderador', 'guard_name' => 'web'],
            ['name' => 'usuario', 'guard_name' => 'web'],
        ];

        foreach ($data as $key => $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}