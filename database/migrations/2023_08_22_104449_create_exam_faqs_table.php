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
        Schema::create('exam_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->bigInteger('order_key')->unique();
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('exam_faqs');
    }
};
