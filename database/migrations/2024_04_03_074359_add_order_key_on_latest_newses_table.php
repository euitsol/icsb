<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('latest_newses', function (Blueprint $table) {
            $table->bigInteger('order_key')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('latest_newses', function (Blueprint $table) {
            $table->bigInteger('order_key')->unique()->nullable();
        });
    }

};
