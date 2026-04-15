<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trans_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->string('order_code', 50);
            $table->date('order_date');
            $table->date('order_end_date');
            $table->tinyInteger('order_status');
            $table->integer('order_pay');
            $table->integer('order_change');
            $table->integer('total');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('trans_order', function (Blueprint $table) {
            $table->foreign('id_customer')
                  ->references('id')->on('customer')
                  ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('trans_order', function (Blueprint $table) {
            $table->dropForeign(['id_customer']);
        });
        Schema::dropIfExists('trans_order');
    }
};