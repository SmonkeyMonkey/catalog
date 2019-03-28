<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();;
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('collection_id')->unsigned()->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('title');
            $table->text('specifications')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();

        });
        Schema::table('products',function (Blueprint $table){
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
