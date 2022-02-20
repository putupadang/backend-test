<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostReactionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('post_reactions', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id');
      $table->string('post_id');
      $table->integer('reaction'); //0 = unlike, 1 = like
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('post_reactions');
  }
}
