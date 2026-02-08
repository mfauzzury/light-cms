<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view_contents',
            'create_contents',
            'edit_contents',
            'delete_contents',
            'publish_contents',
            'manage_media',
            'manage_users',
            'manage_roles',
            'manage_settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions

        // Super Admin - All permissions
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - All content and media permissions, manage users
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo([
            'view_contents',
            'create_contents',
            'edit_contents',
            'delete_contents',
            'publish_contents',
            'manage_media',
            'manage_users',
        ]);

        // Editor - All content permissions, manage media
        $editor = Role::create(['name' => 'Editor']);
        $editor->givePermissionTo([
            'view_contents',
            'create_contents',
            'edit_contents',
            'delete_contents',
            'publish_contents',
            'manage_media',
        ]);

        // Author - View, create, and edit contents only
        $author = Role::create(['name' => 'Author']);
        $author->givePermissionTo([
            'view_contents',
            'create_contents',
            'edit_contents',
        ]);
    }
}
