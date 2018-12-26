<?php

use Illuminate\Database\Seeder;
use App\Counter;

class CountersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    Counter::create([
      'title' => 'Couter de David',
      'color' => 'azul',
      'start_date' => '2018-12-12',
      'status' => 1,
      'user_id' => 1
    ]);
    
    Counter::create([
      'title' => 'Couter de Maria',
      'color' => 'rojo',
      'start_date' => '2018-12-12',
      'status' => 0,
      'user_id' => 2
    ]);
    
    Counter::create([
      'title' => 'Couter de Samuel',
      'color' => 'verde',
      'start_date' => '2018-12-12',
      'status' => 0,
      'user_id' => 3
    ]);
    
    Counter::create([
      'title' => 'Couter de Anaiz',
      'color' => 'rosado',
      'start_date' => '2018-12-12',
      'status' => 1,
      'user_id' => 4
    ]);
  }
}
