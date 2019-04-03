<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('collections',function (Blueprint $table){
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
