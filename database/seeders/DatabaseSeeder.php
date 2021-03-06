<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin', 'user'
        ];
        foreach ($roles as $role) {
            Role::query()->create(['name' => $role]);
        }

        User::factory()->create();
    }
}
