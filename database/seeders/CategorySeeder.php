<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Электроника', 'slug' => 'electronics'],
            ['name' => 'Авто', 'slug' => 'auto'],
            ['name' => 'Недвижимость', 'slug' => 'real-estate'],
            ['name' => 'Одежда', 'slug' => 'clothing'],
            ['name' => 'Услуги', 'slug' => 'services'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
