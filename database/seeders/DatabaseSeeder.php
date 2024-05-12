<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Size;
use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Product::factory(2)->create();
        Image::factory(10)->create();
        Size::factory(5)->create();
    }
}
