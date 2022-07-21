<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTenantManagementController extends Controller
{
    public function create(User $user)
    {
        dd($user->tenant);
        $tenants = Tenant::all();

        return view('auth.choose-tenant', compact('tenants', 'user'));
    }

    public function store(Request $request, User $user)
    {
        $user->update([
            'tenant_id' => $request->tenant
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
