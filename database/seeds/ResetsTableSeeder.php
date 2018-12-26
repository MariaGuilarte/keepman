<?php

use Illuminate\Database\Seeder;
use App\Reset;

class ResetsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Reset::create([
      'count' => 12,
      'start_date' => '2018-12-12',
      'finish_date' => '2018-12-22',
      'counter_id' => 1
    ]);
    
    Reset::create([
      'count' => 5,
      'start_date' => '2018-12-12',
      'finish_date' => '2018-12-22',
      'counter_id' => 1
    ]);
    
    Reset::create([
      'count' => 3,
      'start_date' => '2018-12-12',
      'finish_date' => '2018-12-22',
      'counter_id' => 2
    ]);
    
    Reset::create([
      'count' => 5,
      'start_date' => '2018-12-12',
      'finish_date' => '2018-12-22',
      'counter_id' => 3
    ]);
    
    Reset::create([
      'count' => 8,
      'start_date' => '2018-12-12',
      'finish_date' => '2018-12-22',
      'counter_id' => 4
    ]);
  }
}
