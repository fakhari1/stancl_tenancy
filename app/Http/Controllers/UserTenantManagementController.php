<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class UserTenantManagementController extends Controller
{
    public function create(User $user)
    {
        $tenants = Tenant::all();

        return view('auth.choose-tenant', compact('tenants', 'user'));
    }

    public function store(Request $request, User $user)
    {

    }
}
