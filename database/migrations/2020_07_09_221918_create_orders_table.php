<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('department')->nullable();
            $table->string('number_of_copies')->nullable();
            $table->string('number_of_originals')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('kfs_chart')->nullable();
            $table->string('kfs_account')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('paper_size')->nullable();
            $table->string('duplex')->nullable();
            $table->string('white_paper_options')->nullable();
            $table->string('color_paper_color')->nullable();
            $table->string('cover_stock')->nullable();
            $table->string('cover_stock_color')->nullable();
            $table->string('binding')->nullable();
            $table->string('folding')->nullable();
            $table->string('folding_other')->nullable();
            $table->string('cutting')->nullable();
            $table->string('cutting_other')->nullable();
            $table->string('post_copy_options')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
