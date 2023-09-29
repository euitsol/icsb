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
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->bigInteger('order_key')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('committee_type');
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('committee_type')->references('id')->on('committee_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('committees');
    }
};
