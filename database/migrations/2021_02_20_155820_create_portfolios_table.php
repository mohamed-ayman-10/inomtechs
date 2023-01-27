<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('category_name');
            $table->integer('category_id');
            $table->text('title');
            $table->text('desc')->nullable();
            $table->integer('image_status')->default(1);
            $table->text('thumbnail_image')->nullable();
            $table->string('portfolio_slug');
            $table->integer('status')->default(1);
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->integer('breadcrumb_status')->default(1);
            $table->text('custom_breadcrumb_image')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('portfolios');
    }
}
