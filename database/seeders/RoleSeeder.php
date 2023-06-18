<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Ketua', 'Bendahara', 'Admin', 'Takmir', 'Muzakki'];

        foreach ($roles as $role) {
            # code...
            DB::table('roles')->insert([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }
    }
}
