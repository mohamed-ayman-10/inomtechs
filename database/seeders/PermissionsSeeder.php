<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'uploads check']);
        Permission::create(['name' => 'subscribe check']);
        Permission::create(['name' => 'banner check']);
        Permission::create(['name' => 'external url check']);
        Permission::create(['name' => 'about us check']);
        Permission::create(['name' => 'features check']);
        Permission::create(['name' => 'services check']);
        Permission::create(['name' => 'counters check']);
        Permission::create(['name' => 'work processes check']);
        Permission::create(['name' => 'skill check']);
        Permission::create(['name' => 'portfolio check']);
        Permission::create(['name' => 'teams check']);
        Permission::create(['name' => 'testimonials check']);
        Permission::create(['name' => 'blogs check']);
        Permission::create(['name' => 'settings check']);
        Permission::create(['name' => 'contact check']);
        Permission::create(['name' => 'pages check']);
        Permission::create(['name' => 'comments check']);
        Permission::create(['name' => 'language check']);
        Permission::create(['name' => 'clear cache check']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('uploads check');
        $role2->givePermissionTo('subscribe check');
        $role2->givePermissionTo('banner check');
        $role2->givePermissionTo('external url check');
        $role2->givePermissionTo('about us check');
        $role2->givePermissionTo('features check');
        $role2->givePermissionTo('services check');
        $role2->givePermissionTo('counters check');
        $role2->givePermissionTo('work processes check');
        $role2->givePermissionTo('skill check');
        $role2->givePermissionTo('portfolio check');
        $role2->givePermissionTo('teams check');
        $role2->givePermissionTo('testimonials check');
        $role2->givePermissionTo('blogs check');
        $role2->givePermissionTo('settings check');
        $role2->givePermissionTo('contact check');
        $role2->givePermissionTo('pages check');
        $role2->givePermissionTo('comments check');
        $role2->givePermissionTo('language check');
        $role2->givePermissionTo('clear cache check');

        $role3 = Role::create(['name' => 'editor']);
        $role3->givePermissionTo('blogs check');
        $role3->givePermissionTo('services check');
        $role3->givePermissionTo('portfolio check');


        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin16@elsecolor.com',
            'password' => Hash::make('superadmin16'),
            'type' => 0,
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin16@elsecolor.com',
            'password' => Hash::make('admin16'),
            'type' => 0,
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor16@gmail.com',
            'password' => Hash::make('editor16'),
            'type' => 0,
        ]);
        $user->assignRole($role3);

    }
}
