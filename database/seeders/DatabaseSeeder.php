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

        $id1 = 'isfahan';
        $tenant1 = Tenant::factory()->create(['id' => $id1]);
        // {id}.saas.test
        $domain1 = $id1 . "." . config('tenancy.central_domains')[0];
        $tenant1->domains()->create(['domain' => $domain1]);

        $id2 = 'tehran';
        $tenant2 = Tenant::factory()->create(['id' => $id2]);
        // {id}.saas.test
        $domain2 = $id2 . "." . config('tenancy.central_domains')[0];
        $tenant2->domains()->create(['domain' => $domain2]);

        $id3 = 'mashhad';
        $tenant3 = Tenant::factory()->create(['id' => $id3]);
        // {id}.saas.test
        $domain3 = $id3 . "." . config('tenancy.central_domains')[0];
        $tenant3->domains()->create(['domain' => $domain3]);

        $id4 = 'shiraz';
        $tenant4 = Tenant::factory()->create(['id' => $id4]);
        // {id}.saas.test
        $domain4 = $id4 . "." . config('tenancy.central_domains')[0];
        $tenant4->domains()->create(['domain' => $domain4]);

        $id5 = 'tabriz';
        $tenant5 = Tenant::factory()->create(['id' => $id5]);
        // {id}.saas.test
        $domain5 = $id5 . "." . config('tenancy.central_domains')[0];
        $tenant5->domains()->create(['domain' => $domain5]);


        User::factory()->create([
            'name' => 'User Tenant 1',
            'email' => 'user_tenant_1@gmail.com',
            'tenant_id' => $id1
        ]);
        User::factory()->create([
            'name' => 'User Tenant 2',
            'email' => 'user_tenant_2@gmail.com',
            'tenant_id' => $id2
        ]);
        User::factory()->create([
            'name' => 'User Tenant 3',
            'email' => 'user_tenant_3@gmail.com',
            'tenant_id' => $id3
        ]);
        User::factory()->create([
            'name' => 'User Tenant 4',
            'email' => 'user_tenant_4@gmail.com',
            'tenant_id' => $id4
        ]);
        User::factory()->create([
            'name' => 'User Tenant 5',
            'email' => 'user_tenant_5@gmail.com',
            'tenant_id' => $id5
        ]);
    }
}
