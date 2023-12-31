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
        Schema::create('sample_question_papers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_key')->unique();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->json('files');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('sample_question_papers');
    }
};
