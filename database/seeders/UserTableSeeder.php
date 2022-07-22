<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'User Tenant 1',
            'email' => 'user_tenant_1@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[0]
        ]);

        User::factory()->create([
            'name' => 'User Tenant 2',
            'email' => 'user_tenant_2@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[1]
        ]);

        User::factory()->create([
            'name' => 'User Tenant 3',
            'email' => 'user_tenant_3@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[2]
        ]);

        User::factory()->create([
            'name' => 'User Tenant 4',
            'email' => 'user_tenant_4@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[3]
        ]);

        User::factory()->create([
            'name' => 'User Tenant 5',
            'email' => 'user_tenant_5@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[4]
        ]);
    }
}
