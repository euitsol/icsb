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
        Schema::create('single_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique();
            $table->string('frontend_slug')->unique();
            $table->string('title');
            $table->json('form_data');
            $table->json('documentation')->nullable();
            $table->json('saved_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('single_pages');
    }
};
