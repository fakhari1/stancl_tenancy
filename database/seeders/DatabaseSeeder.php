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


        $this->call([
            TenantTableSeeder::class,
            UserTableSeeder::class
        ]);
    }
}
