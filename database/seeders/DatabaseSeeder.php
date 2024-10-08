<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
        ]);
    }
}
