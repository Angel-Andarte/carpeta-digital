<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Services\RolePermissionService;

class ShareUserPermissions
{
    protected $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    public function handle($request, Closure $next)
    {
        $userId = auth()->id();

        $roles = $this->rolePermissionService->getUserRoles($userId);
        $permissions = [];

        foreach ($roles as $role) {
            $rolePermissions = $this->rolePermissionService->getRolePermissions($role['id']);
            foreach ($rolePermissions as $permission) {
                $permissions[] = $permission['name'];
            }
        }

        View::share('userPermissions', $permissions);

        return $next($request);
    }
}
