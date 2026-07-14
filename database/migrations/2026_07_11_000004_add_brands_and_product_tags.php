<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Brands management table.
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

        // Re-point products.brand_id from options to the new brands table.
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        });

        // Product tags pivot (tags are options filtered by option_group_name).
        Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('options')->onDelete('cascade');
            $table->unique(['product_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');

        // Re-point products.brand_id back to options.
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->foreign('brand_id')->references('id')->on('options')->onDelete('cascade');
        });

        Schema::dropIfExists('brands');
    }
};
