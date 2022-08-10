<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class TenantAuthenticatedController extends Controller
{
    public function create()
    {
        return view('tenants.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        return redirect()->intended(route('tenant.dashboard', $user->tenant_id));
    }

    public function logout()
    {
        if (auth()->check())
            auth()->logout();

        return redirect(tenant('id'));
    }
}
