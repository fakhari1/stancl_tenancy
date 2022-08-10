<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\DatabaseManager;
use Stancl\Tenancy\Exceptions\RouteIsMissingTenantParameterException;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedByPathException;
use Stancl\Tenancy\Middleware\IdentificationMiddleware;
use Stancl\Tenancy\Resolvers\PathTenantResolver;
use Stancl\Tenancy\Tenancy;

class TenancyPathInitialize extends IdentificationMiddleware
{

    /** @var callable|null */
    public static $onFail;

    /** @var Tenancy */
    protected $tenancy;

    /** @var PathTenantResolver */
    protected $resolver;

    protected $databaseManager;

    public function __construct(Tenancy $tenancy, PathTenantResolver $resolver)
    {
        $this->tenancy = $tenancy;
        $this->resolver = $resolver;
    }

    protected $exceptForWords = ['register', 'login', 'dashboard'];


    public function handle(Request $request, Closure $next)
    {
        $this->databaseManager = resolve(DatabaseManager::class);
        $route = $request->route();

        $firstParameterInPath = $request->segment(1);

        if ($route->parameterNames[0] === PathTenantResolver::$tenantParameterName) {
            if (in_array($firstParameterInPath, $this->exceptForWords)) {
                return redirect('/login');
            } else {
                if (tenancy()->find($firstParameterInPath)) {

                    return $this->initializeTenancy(
                        $request, $next, $route
                    );

                } else {
                    return redirect()->route('central.home');
                }
            }
        }


    }

}
