<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trans_order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_service');
            $table->integer('qty');
            $table->double('subtotal', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('trans_order_detail', function (Blueprint $table) {
            $table->foreign('id_order')
                  ->references('id')->on('trans_order')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_service')
                  ->references('id')->on('type_of_service')
                  ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('trans_order_detail', function (Blueprint $table) {
            $table->dropForeign(['id_order']);
            $table->dropForeign(['id_service']);
        });
        Schema::dropIfExists('trans_order_detail');
    }
};