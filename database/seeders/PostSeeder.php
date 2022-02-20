<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Post::insert([
      [
        'id' => '6a6ce549-efbb-4854-9417-51733543740a',
        'user_id' => 2,
        'description' => 'tests posts 1',
        'image' => 'img/950920220220015941.jpg',
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
      ],
    ]);
  }
}
