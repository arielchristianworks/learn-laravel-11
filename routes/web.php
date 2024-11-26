<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome', ['title' => 'Home Page']);
});

Route::get('/blog', function () {
  $data['title'] = 'Blog Page';
  $data['blogs'] = Blog::filter(request(['search', 'category']))
    ->with(['author', 'categories'])
    ->latest()
    ->paginate(6)
    ->withQueryString();

  return view('blog', $data);
});

Route::get('/blog/{blog:slug}', function (Blog $blog) {
  $data['title'] = 'Blog Detail Page';
  $data['blog'] = $blog;

  return view('blog-detail', $data);
});

Route::get('/author/{user}', function (User $user) {
  $blogs = $user->blogs->load('author', 'categories');
  $data['title'] = $user['name'] . "'s Blog Page (" . count($blogs) . " articles)";
  $data['blogs'] = $blogs;

  return view('blog', $data);
});

Route::get('/category/{category:slug}', function (Category $category) {
  $blogs = $category->blogs->load('author', 'categories');
  $data['title'] = "Blog with category: \"" . $category['name'] . "\"";
  $data['blogs'] = $blogs;

  return view('blog', $data);
});

Route::get('/about', function () {
  return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
  return view('contact', ['title' => 'Contact Page']);
});
