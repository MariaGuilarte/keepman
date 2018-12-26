<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'David',
      'email' => 'david@gmail.com',
      'password' => bcrypt(123456)
    ]);
    
    User::create([
      'name' => 'Maria',
      'email' => 'maria@gmail.com',
      'password' => bcrypt(123456)
    ]);
    
    User::create([
      'name' => 'Samuel',
      'email' => 'samuel@gmail.com',
      'password' => bcrypt(123456)
    ]);
    
    User::create([
      'name' => 'Anaiz',
      'email' => 'anaiz@gmail.com',
      'password' => bcrypt(123456)
    ]);
  }
}
