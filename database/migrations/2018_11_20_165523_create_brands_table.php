<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();;
            $table->string('title');
            $table->text('description');
            $table->text('about');
            $table->string('image')->nullable();
            $table->integer('is_published')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->timestamps();

        });
        Schema::table('brands',function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
