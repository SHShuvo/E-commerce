<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesToInsert = [
            ['name' => 'Electronics'],
            ['name' => 'Home'],
            ['name' => 'Men\'s Fashion'],
            ['name' => 'Women\'s Fashion'],
            ['name' => 'Pets'],
            ['name' => 'Arts & Crafts'],
        ];
        Category::insert($categoriesToInsert);
    }
}
