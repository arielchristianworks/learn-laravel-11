<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogXCategory;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogXCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    BlogXCategory::factory(50)->recycle([Category::all(), Blog::all()])->create();
  }
}
