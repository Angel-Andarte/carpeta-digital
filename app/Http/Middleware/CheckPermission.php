<?php

namespace App\Http\Middleware;

use App\Services\RolePermissionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


     protected $rolePermissionService;

     public function __construct(RolePermissionService $rolePermissionService)
     {
         $this->rolePermissionService = $rolePermissionService;
     }

     public function handle($request, Closure $next, $permission)
     {
         $userId = auth()->id();
         $roles = $this->rolePermissionService->getUserRoles($userId);

         foreach ($roles as $role) {
             $permissions = $this->rolePermissionService->getRolePermissions($role['id']);
             if (in_array($permission, array_column($permissions, 'name'))) {
                 return $next($request);
             }
         }

         return response()->json(['error' => 'Unauthorized'], 403);
     }
}
