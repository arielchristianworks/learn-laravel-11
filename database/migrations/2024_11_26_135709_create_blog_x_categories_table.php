<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('blog_x_categories', function (Blueprint $table) {
      $table->id();
      $table->foreignId('blog_id')->constrained(
        table: app(Blog::class)->getTable(),
        indexName: 'category_x_blog_id'
      );
      $table->foreignId('category_id')->constrained(
        table: app(Category::class)->getTable(),
        indexName: 'blog_x_category_id'
      );
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('blog_x_categories');
  }
};
