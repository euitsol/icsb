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
            $table->string('slug')->unique();
            $table->integer('total_participant');
            $table->string('event_location');
            $table->longText('description');
            $table->json('image');
            $table->dateTime('event_start_time');
            $table->dateTime('event_end_time');
            $table->string('video_url')->nullable();
            $table->enum('type', ["1", "0"])->default("0");
            $table->boolean('status')->default(1);
            $table->enum('is_featured', ["0", "1"])->default("0");

            $table->integer('notify')->default(1);
            $table->longText('email_subject')->nullable();
            $table->longText('email_body')->nullable();

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
