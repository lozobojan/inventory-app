<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $roles = ['1' => 'Administrator', '2' => 'User', '3' => 'Support Officer'];
        foreach ($roles as $key => $role) {
            Role::query()->create(['id' => $key, 'name' => $role]);
        }
    }
}
