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
        Schema::create('banner_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('banner_images');
    }

};
