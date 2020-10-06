<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Permission);

        return view('admin.permissions.index',[
            'permissions' => Permission::all()
        ]);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $this->validate($request,[
            'display_name' => 'required',
        ]);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.edit', $permission)->withFlash('El permiso ha sido actualizado correctamente');
    }
}
