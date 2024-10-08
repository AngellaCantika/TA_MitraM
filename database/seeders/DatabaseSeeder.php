<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name'=> 'mekanik',
        ]);

        Role::create ([
            'role_name'=> 'user',
        ]);

        User::factory(5)->create();
    }
}
