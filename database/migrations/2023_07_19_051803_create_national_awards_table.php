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
        Schema::create('national_awards', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('image');
            $table->string('file')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->enum('is_featured', ["0", "1"])->default("0");
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('national_awards');
    }
};
