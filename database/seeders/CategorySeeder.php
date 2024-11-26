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
    Category::create(['slug' => 'nature', 'name' => 'Nature']);
    Category::create(['slug' => 'fiction', 'name' => 'Fiction']);
    Category::create(['slug' => 'sci-fi', 'name' => 'Sci-Fi']);
    Category::create(['slug' => 'internet', 'name' => 'Internet']);
    Category::create(['slug' => 'modern', 'name' => 'Modern']);
    Category::create(['slug' => 'aestetic', 'name' => 'Aestetic']);
  }
}
