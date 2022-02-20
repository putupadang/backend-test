<?php

namespace Database\Seeders;

use App\Models\PostReaction;
use Illuminate\Database\Seeder;

class PostReactionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    PostReaction::insert([
      ['user_id' => 1, 'post_id' => '6a6ce549-efbb-4854-9417-51733543740a', 'reaction' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 3, 'post_id' => '6a6ce549-efbb-4854-9417-51733543740a', 'reaction' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 4, 'post_id' => '6a6ce549-efbb-4854-9417-51733543740a', 'reaction' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 5, 'post_id' => '6a6ce549-efbb-4854-9417-51733543740a', 'reaction' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['user_id' => 6, 'post_id' => '6a6ce549-efbb-4854-9417-51733543740a', 'reaction' => 1, 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
    ]);
  }
}
