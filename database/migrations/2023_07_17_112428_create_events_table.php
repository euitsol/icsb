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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('total_participant');
            $table->string('event_location');
            $table->longText('description');
            $table->json('image');
            $table->dateTime('event_start_time');
            $table->dateTime('event_end_time');
            $table->string('video_url')->nullable();
            $table->enum('type', ['online', 'offline'])->default('offline');
            $table->boolean('status')->default(1);
            $table->integer('notify')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('events');
    }
};
