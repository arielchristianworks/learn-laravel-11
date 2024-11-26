<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $title = fake()->sentence(5);
    return [
      'title' => $title,
      'slug' => Str::slug($title, '-'),
      // 'author_id' => 1,
      'author_id' => User::factory(),
      'description' => fake()->paragraph(50),
      'created_at' => fake()->dateTimeBetween('-2 week', 'now'),
    ];

    // App\Models\Blog::factory(50)->recycle(User::factory(5)->create())->create();
  }
}
