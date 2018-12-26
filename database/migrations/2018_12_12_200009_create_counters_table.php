<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
  public function up() {
    Schema::create('counters', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title', 191);
      $table->string('color', 191)->nullable();
      $table->datetime('start_date');
      $table->integer('status')->nullable();
      
      $table->unsignedInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('cascade');
      
      $table->softDeletes();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('counters');
  }
}
