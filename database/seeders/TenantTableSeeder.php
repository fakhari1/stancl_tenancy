<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantTableSeeder extends Seeder
{
    public static $ids = ['isfahan', 'tehran', 'mashhad', 'shiraz', 'tabriz'];

    public function run()
    {
        $first_central_domain = config('tenancy.central_domains')[0];

        $tenant1 = Tenant::factory()->create(['id' => self::$ids[0]]);
        // {id}.saas.test
        $domain1 = config('tenancy.central_domains')[0] . "/" . self::$ids[0];
        $tenant1->domains()->create(['domain' => $domain1]);

        $tenant2 = Tenant::factory()->create(['id' => self::$ids[1]]);
        // {id}.saas.test
        $domain2 = config('tenancy.central_domains')[0] . "/" . self::$ids[1];
        $tenant2->domains()->create(['domain' => $domain2]);

        $tenant3 = Tenant::factory()->create(['id' => self::$ids[2]]);
        // {id}.saas.test
        $domain3 = config('tenancy.central_domains')[0] . "/" . self::$ids[2];
        $tenant3->domains()->create(['domain' => $domain3]);

        $tenant4 = Tenant::factory()->create(['id' => self::$ids[3]]);
        // {id}.saas.test
        $domain4 = config('tenancy.central_domains')[0] . "/" . self::$ids[3];
        $tenant4->domains()->create(['domain' => $domain4]);

        $tenant5 = Tenant::factory()->create(['id' => self::$ids[4]]);
        // {id}.saas.test
        $domain5 = config('tenancy.central_domains')[0] . "/" . self::$ids[4];
        $tenant5->domains()->create(['domain' => $domain5]);
    }
}
