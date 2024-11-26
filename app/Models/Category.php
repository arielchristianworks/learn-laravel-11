<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  /** @use HasFactory<\Database\Factories\CategoryFactory> */
  use HasFactory;

  protected $fillable = [
    'slug',
    'name',
  ];

  public function blogs(): BelongsToMany
  {
    return $this->belongsToMany(Blog::class, app(BlogXCategory::class)->getTable())->using(BlogXCategory::class);
  }
}
