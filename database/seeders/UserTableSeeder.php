<?php

namespace Database\Seeders;

use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stancl\Tenancy\Database\DatabaseManager;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DatabaseManager $database)
    {
        $user1 = User::factory()->create([
            'name' => 'User Tenant 1',
            'email' => 'user_tenant_1@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[0]
        ]);

        $database->connectToTenant($user1->tenant);
        $user_tenant = new TenantUser();
        $user_tenant = $user1->replicate();
        $user_tenant->save();
        $database->reconnectToCentral();

        $user2 = User::factory()->create([
            'name' => 'User Tenant 2',
            'email' => 'user_tenant_2@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[1]
        ]);

        $database->connectToTenant($user2->tenant);
        $user_tenant = new TenantUser();
        $user_tenant = $user2->replicate();
        $user_tenant->save();
        $database->reconnectToCentral();

        $user3 = User::factory()->create([
            'name' => 'User Tenant 3',
            'email' => 'user_tenant_3@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[2]
        ]);

        $database->connectToTenant($user3->tenant);
        $user_tenant = new TenantUser();
        $user_tenant = $user3->replicate();
        $user_tenant->save();
        $database->reconnectToCentral();

        $user4 = User::factory()->create([
            'name' => 'User Tenant 4',
            'email' => 'user_tenant_4@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[3]
        ]);

        $database->connectToTenant($user4->tenant);
        $user_tenant = new TenantUser();
        $user_tenant = $user4->replicate();
        $user_tenant->save();
        $database->reconnectToCentral();

        $user5 = User::factory()->create([
            'name' => 'User Tenant 5',
            'email' => 'user_tenant_5@gmail.com',
            'tenant_id' => TenantTableSeeder::$ids[4]
        ]);

        $database->connectToTenant($user5->tenant);
        $user_tenant = new TenantUser();
        $user_tenant = $user5->replicate();
        $user_tenant->save();
        $database->reconnectToCentral();
    }
}
