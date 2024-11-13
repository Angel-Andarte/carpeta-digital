<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RolePermissionService
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('ROLES_API_BASE_URL');
    }

    public function getUserRoles($userId)
    {
        $response = Http::get("{$this->apiBaseUrl}/user/{$userId}/roles");

        return $response->successful() ? $response->json() : [];

    }

    public function assignRoleToUser($userId, $role)
    {
        $response = Http::post("{$this->apiBaseUrl}/user/{$userId}/assign-role", ['role' => $role]);
        return $response->successful() ? $response->json() : ['error' => 'Unable to assign role'];
    }

    public function getRolePermissions($roleId)
    {
        $response = Http::get("{$this->apiBaseUrl}/role/{$roleId}/permissions");
        return $response->successful() ? $response->json() : [];
    }
}
