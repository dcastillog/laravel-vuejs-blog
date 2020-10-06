<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $roles = Role::all();  
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;

        $this->authorize('create', $role);

        return view('admin.roles.create', [
            'permissions' => Permission::pluck('name','id'),
            'role' => $role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        // $data = $request->validate([
        //     'name' => 'required|unique:roles',
        //     'display_name' => 'required',
        // ]);

        $this->authorize('create', new Role);

        Role::create($request->validated());
        
        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol fué creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'permissions' => Permission::pluck('name','id'),
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        // $data = $request->validate([
        //     'display_name' => 'required|unique:roles,name,' . $role->id,  // Ignora el nombre del id del rol que se está editando 
        //     'guard_name' => 'required' 
        // ]);

        $this->authorize('update', $role);

        $role->update($request->validated());

        $role->permissions->detach();

        if( $request->has('permissions') )
        {
            $role->givePermissionsTo($request->permissions);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El rol ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El rol ha sido eliminado');
    }
}
