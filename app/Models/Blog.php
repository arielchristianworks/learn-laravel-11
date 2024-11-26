<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
  use HasFactory;

  // Untuk default smua query eager loading otomatis
  protected $with = ['author'];

  protected $fillable = [
    'title',
    'slug',
    'description',
  ];

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'author_id');
  }

  public function categories(): BelongsToMany
  {
    return $this->belongstoMany(Category::class, app(BlogXCategory::class)->getTable())->using(BlogXCategory::class);
  }

  public function scopeFilter(Builder $query, array $filters): void
  {
    $query->when($filters['search'] ?? false, function (Builder $query, $search) {
      $query->where('title', 'like', '%' . $search . '%');
    })->when($filters['category'] ?? false, function (Builder $query, $category) {
      $query->whereHas('categories', fn(Builder $query) => $query->where('slug', $category));
    });
  }
}
