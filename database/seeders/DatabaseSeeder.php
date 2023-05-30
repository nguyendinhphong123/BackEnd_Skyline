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
        $this->call([
            CategorySeeder::class,
            GroupSeeder::class,
            RoleSeeder::class,
            Group_RoleSeeder::class,
            UserSeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
