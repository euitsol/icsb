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
            $table->longText('description');
            $table->string('image');
            $table->timestamp('event_time');
            $table->date('event_date');
            $table->boolean('status')->default(1);
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
