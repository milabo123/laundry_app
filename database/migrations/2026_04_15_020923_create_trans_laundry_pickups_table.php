<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trans_laundry_pickup', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_customer');
            $table->dateTime('pickup_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('trans_laundry_pickup', function (Blueprint $table) {
            $table->foreign('id_order')
                  ->references('id')->on('trans_order')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_customer')
                  ->references('id')->on('customer')
                  ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('trans_laundry_pickup', function (Blueprint $table) {
            $table->dropForeign(['id_order']);
            $table->dropForeign(['id_customer']);
        });
        Schema::dropIfExists('trans_laundry_pickup');
    }
};