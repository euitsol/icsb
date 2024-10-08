<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cs_firms', function (Blueprint $table) {
            $table->dropUnique('cs_firms_private_practice_certificate_no_unique');
        });
    }
};
