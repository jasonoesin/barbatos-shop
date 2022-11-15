<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_details', function (Blueprint $table) {
            $table->unsignedBigInteger("history_id");
            $table->unsignedBigInteger("product_id");
            $table->unsignedInteger("qty");
            $table->timestamps();

            // Foreign
            $table->foreign("history_id")->references('history_id')->on("histories")
                ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("product_id")->references('id')->on("products")
                ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_details');
    }
}
