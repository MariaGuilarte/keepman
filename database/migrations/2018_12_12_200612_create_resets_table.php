<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResetsTable extends Migration
{
  public function up() {
    Schema::create('resets', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('count');
      $table->date('start_date');
      $table->date('finish_date');
      
      $table->unsignedInteger('counter_id');
      $table->foreign('counter_id')->references('id')->on('counters')->nullable()->onDelete('cascade');
      
      $table->softDeletes();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('resets');
  }
}
