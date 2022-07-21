<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Hussein',
            'email' => 'hosein.fakhari1998@gmail.com',
            'is_admin' => true
        ]);

        Tenant::factory()->create(['id' => 'Isfahan']);
        Tenant::factory()->create(['id' => 'Tehran']);
        Tenant::factory()->create(['id' => 'Mashhad']);
        Tenant::factory()->create(['id' => 'Shiraz']);
        Tenant::factory()->create(['id' => 'Tabriz']);

        User::factory()->create([
            'name' => 'User Tenant 1',
            'email' => 'user_tenant_1@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'User Tenant 2',
            'email' => 'user_tenant_2@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'User Tenant 3',
            'email' => 'user_tenant_3@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'User Tenant 4',
            'email' => 'user_tenant_4@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'User Tenant 5',
            'email' => 'user_tenant_5@gmail.com',
        ]);
    }
}
