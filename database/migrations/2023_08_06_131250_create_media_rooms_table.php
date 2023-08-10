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
        Schema::create('media_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->unsignedBigInteger('category_id');
            $table->string('slug')->unique();
            $table->string('thumbnail_image');
            $table->json('additional_images')->nullable();
            $table->json('files')->nullable();
            $table->longText('description');
            $table->enum('permission', ["0", "1","-1"])->default("0");
            $table->enum('is_featured', ["0", "1"])->default("0");
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('category_id')->references('id')->on('media_room_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('media_rooms');
    }
};
