<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Stancl\Tenancy\Events\TenancyInitialized;

class TenantController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show(Tenant $tenant)
    {
        dd($tenant);
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {

        $tenant = Tenant::query()->create(['id' => $request->id]);

        // {id}.saas.test
        $domain = $request->id . "." . config('tenancy.central_domains')[0];
        $tenant->domains()->create(['domain' => $domain]);

        return redirect()->to($tenant->id);
    }
}
