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
        Schema::create('media_room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('media_room_categories');
    }
};
