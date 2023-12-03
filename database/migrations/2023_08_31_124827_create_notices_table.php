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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->json('files');
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);

            $table->integer('notify')->default(1);
            $table->longText('email_subject')->nullable();
            $table->longText('email_body')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('cat_id')->references('id')->on('notice_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('notices');
    }
};
