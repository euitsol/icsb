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
        Schema::create('president_durations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('president_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('president_id')->references('id')->on('presidents')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('president_durations');
    }
};
