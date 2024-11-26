<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::factory()->create([
      'name' => 'Ariel Christian',
      'email' => 'works.arielchristian@gmail.com',
      'is_admin' => true,
    ]);
    User::factory(3)->admin()->create();
    User::factory(15)->create();
    User::factory(5)->unverified()->create();
  }
}
