<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\AuditColumnsTrait;

return new class extends Migration
{
    use AuditColumnsTrait;

    public function up(): void
    {
        Schema::create('assined_officers', function (Blueprint $table) {
            $table->id();
            $table->string('order_key');
            $table->string('name');
            $table->string('image');
            $table->string('designation');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('assined_officers');
    }
};
