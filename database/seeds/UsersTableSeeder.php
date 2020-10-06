<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        // Crea los roles
        $adminRole =  Role::create(['name' => 'Admin']);
        $writerRole =  Role::create(['name' => 'Writer']);

        // Creamos el permiso que determina quien tiene permisos para ver todos los posts
        $viewPostsPermission = Permission::create(['name' => 'View posts','display_name' => 'Ver publicaciones']);
        $createPostsPermission = Permission::create(['name' => 'Create posts','display_name' => 'Crear publicaciones']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts','display_name' => 'Actualizar publicaciones']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts','display_name' => 'Eliminar publicaciones']);

        $viewUsersPermission = Permission::create(['name' => 'View users','display_name' => 'Ver usuarios']);
        $createUsersPermission = Permission::create(['name' => 'Create users','display_name' => 'Crear usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'Update users','display_name' => 'Actualizar usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users','display_name' => 'Eliminar usuarios']);


        $viewRolesPermission = Permission::create(['name' => 'View roles','display_name' => 'Ver roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles','display_name' => 'Crear roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles','display_name' => 'Actualizar roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles','display_name' => 'Eliminar roles']);

        $viewPermissionsPermission = Permission::create(['name' => 'View permissions','display_name' => 'Ver permisos']);
        $updatePermissionsPermission = Permission::create(['name' => 'Update permissions','display_name' => 'Actualizar permisos']);

        $adminRole->givePermissionTo($viewPostsPermission->name);
        $adminRole->givePermissionTo($createPostsPermission->name);
        $adminRole->givePermissionTo($updatePostsPermission->name);
        $adminRole->givePermissionTo($deletePostsPermission->name);

        $writerRole->givePermissionTo($createUsersPermission->name);
        $writerRole->givePermissionTo($createRolesPermission->name);

        $admin = new User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@larablog.com';
        $admin->password = '123456';  // La contraseña se encripta en el mutable setPasswordAttribute() en el User Model
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User();
        $writer->name = 'Visitor';
        $writer->email = 'visitor@larablog.com';
        $writer->password = '123456'; // La contraseña se encripta en el mutable setPasswordAttribute() en el User Model
        $writer->save();
        
        $writer->assignRole($writerRole);
    }
}
