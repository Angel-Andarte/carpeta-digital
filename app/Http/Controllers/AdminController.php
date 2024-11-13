<?php

namespace App\Http\Controllers;

use App\Services\RolePermissionService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    public function index(){

        $userId = auth()->id();
        $roles = $this->rolePermissionService->getUserRoles($userId);

        return view('dashboard', compact('roles'));
    }


}
