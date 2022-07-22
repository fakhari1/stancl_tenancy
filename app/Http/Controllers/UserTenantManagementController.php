<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Database\DatabaseManager;


class UserTenantManagementController extends Controller
{
    public function create(User $user, DatabaseManager $database)
    {
//        dd(User::first(), DB::table('tenant_tehran.users')->get(), User::first());
//        dd(DB::table('tenant_tehran.users')->get());
//        config(
//            [
//                'database.connections.tenant' => $user->tenant->database()->connection()
//            ]
//        );

        $database->connectToTenant($user->tenant);
        $database->reconnectToCentral();

        dd(User::first());
//        dd(User::on($user->tenant->database()->connection())->get());


//        $connection = sprintf("database.connections.%s", config('database.default'));
//        DB::purge(config('database.default'));
//        DB::reconnect(config('database.default'));
//
//        $db = DB::connection();
//        $current_db = '';
//        foreach ($db->select("SHOW DATABASES") as $database) {
//            $arr = json_decode(json_encode($database), true);
//            if ($arr['Database'] == $user->tenant->tenancy_db_name) {
//                $current_db = $arr['Database'];
//            }
//        }
//
//        config()->set($connection . '.database', $current_db);
//
//
//
//        dd(DB::select("select * from {$current_db}.users"));

        return 'hi';
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
