<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\CreatePermissionRequest;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Permissions/PermissionIndex',  [
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Permissions/Create');
    }

    public function store(CreatePermissionRequest $request): RedirectResponse
    {
        Permission::create($request->validated());
        return to_route('permissions.index');
    }

    public function edit(Permission $permission): Response
    {
        return Inertia::render('Admin/Permissions/Edit',[
            'permission' => new PermissionResource($permission)
        ]);
    }

    public function update(CreatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update($request->validated());
        return to_route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}

