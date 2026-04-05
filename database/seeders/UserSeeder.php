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
        User::factory()->create([
            'name' => 'Ishaq Abo Ouda',
            'email' => 'ishaq@boss.com',
            'role' => 'admin',
            'password' => Hash::make('123456789'),
        ]);

        User::factory()->create([
            'name' => 'osama Abo Ouda',
            'email' => 'osama@editor.com',
            'role' => 'editor',
            'password' => Hash::make('123456789'),
        ]);
        User::factory()->create([
            'name' => 'alaa Abo Ouda',
            'email' => 'alaa@editor.com',
            'role' => 'editor',
            'password' => Hash::make('123456789'),
        ]);
    }
}