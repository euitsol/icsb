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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('thumbnail_image');
            $table->json('additional_images');
            $table->json('files')->nullable();
            $table->longText('description');
            $table->enum('permission', ["0", "1","-1"])->default("0");
            $table->enum('is_featured', ["0", "1"])->default("0");
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('blogs');
    }
};
