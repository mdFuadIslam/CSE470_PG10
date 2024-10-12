<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@g.c',
            'password' => bcrypt('12345678'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'fuad',
            'email' => 'fuad@g.c',
            'password' => bcrypt('12345678'),
        ]);
        \App\Models\Sale::factory()->create([
            'username' => 'Admin',
            'name' => 'Nvidia GeForce RTX 4050',
            'description' => 'This is a test sale',
            'price' => 52000,
            'imgUrl' => 'https://www.custompc.com/wp-content/sites/custompc/2023/08/nvidia-geforce-rtx-4050-release-date-specs-price-rumors.jpg',
        ]);
        \App\Models\Rent::factory()->create([
            'username' => 'Admin',
            'duration' => 3,
            'name' => 'Nvidia GeForce RTX 4050 rent',
            'description' => 'This is a test rent',
            'price' => 2000,
            'imgUrl' => 'https://www.custompc.com/wp-content/sites/custompc/2023/08/nvidia-geforce-rtx-4050-release-date-specs-price-rumors.jpg',
        ]);
        
    }
}
