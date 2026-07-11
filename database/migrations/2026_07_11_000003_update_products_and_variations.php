<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        // SKU now lives on variations, so make the product-level SKU optional/longer.
        DB::statement('ALTER TABLE products MODIFY SKU VARCHAR(100) NULL');

        Schema::table('product_variations', function (Blueprint $table) {
            $table->enum('stock_status', ['instock', 'outofstock'])->default('instock')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE products MODIFY SKU VARCHAR(8) NOT NULL");

        Schema::table('product_variations', function (Blueprint $table) {
            $table->dropColumn('stock_status');
        });
    }
};
