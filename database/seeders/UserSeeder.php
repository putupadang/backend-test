<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::insert([
      ['name' => 'Demo 1', 'email' => 'demo@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 2', 'email' => 'demo2@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 3', 'email' => 'demo3@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 4', 'email' => 'demo4@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 5', 'email' => 'demo5@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 6', 'email' => 'demo6@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 7', 'email' => 'demo7@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 8', 'email' => 'demo8@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 9', 'email' => 'demo9@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
      ['name' => 'Demo 10', 'email' => 'demo10@email.com', 'password' => bcrypt('12341234'), 'created_at' => date('Y-m-d h:i:s'), 'updated_at' => date('Y-m-d h:i:s')],
    ]);
  }
}
