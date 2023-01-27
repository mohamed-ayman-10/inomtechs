<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->text('title');
            $table->longText('desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->enum('image_status', ['enable', 'disable']);
            $table->text('service_image')->nullable();
            $table->string('icon')->nullable();
            $table->string('service_slug');
            $table->integer('status')->default(1);
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->integer('breadcrumb_status')->default(0);
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
        Schema::dropIfExists('services');
    }
}
