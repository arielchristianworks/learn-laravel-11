<?php

use App\Models\User;
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
    Schema::create('blogs', function (Blueprint $table) {
      $table->id();
      $table->tinyText('title');
      $table->string('slug')->unique();
      $table->longText('description');
      // $table->unsignedBigInteger('author_id');
      // $table->foreign('author_id')->references('id')->on(app(User::class)->getTable());
      $table->foreignId('author_id')->constrained(
        table: app(User::class)->getTable(),
        indexName: 'blogs_user_id'
      );
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('blogs');
  }
};
