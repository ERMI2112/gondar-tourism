<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['name' => 'Historical', 'slug' => 'historical'],
            ['name' => 'Religious', 'slug' => 'religious'],
            ['name' => 'Natural', 'slug' => 'natural'],
            ['name' => 'Cultural', 'slug' => 'cultural'],
        ];
        foreach ($cats as $cat) Category::create($cat);
    }
}
