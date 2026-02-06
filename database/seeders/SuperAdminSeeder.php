<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ساخت role اگر وجود ندارد
        $role = Role::firstOrCreate(
            [
                'name' => 'super_admin',
                'guard_name' => 'web', // خیلی مهم
            ]
        );

        // 2. ساخت user اگر وجود ندارد
        $user = User::firstOrCreate(
            ['email' => 'arthur@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('36500579'),
            ]
        );

        // 3. دادن role به user
        if (!$user->hasRole($role->name)) {
            $user->assignRole($role);
        }
    }
}
