<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\DatabaseManager;
use Stancl\Tenancy\Facades\Tenancy;


class UserTenantManagementController extends Controller
{
    public function create(User $user)
    {
        $tenants = Tenant::all();
        return view('auth.choose-tenant', compact('tenants', 'user'));
    }

    public function store(Request $request, User $user)
    {
        $user->update([
            'tenant_id' => $request->tenant
        ]);

        return redirect()->route('user.tenants.clone', $user);
    }

    public function cloneUser(User $user, DatabaseManager $database)
    {
        $database->connectToTenant($user->tenant);

        $tenantUser = TenantUser::query()->create($user->toArray());

        auth()->logout();
        return redirect("/{$tenantUser->tenant->id}");
    }
}
