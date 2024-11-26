<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogXCategory extends Pivot
{
  use HasFactory;

  public $incrementing = true;
  protected $table = 'blog_x_categories';
}
