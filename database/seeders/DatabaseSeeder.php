<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $categories = [
            ['title' => 'Category 1'],
            ['title' => 'Category 2'],
            ['title' => 'Category 3'],
            ['title' => 'Category 4'],
            ['title' => 'Category 5'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
