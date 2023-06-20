<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['Ketua', 'Bendahara', 'Admin', 'Takmir', 'Muzakki'];

        foreach ($name as $value) {
            $user = User::create([
                'name' => $value,
                'email' => strtolower($value) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
            $user->assignRole($value);
        }
    }
}
