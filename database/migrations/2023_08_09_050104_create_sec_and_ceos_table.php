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
        Schema::create('sec_and_ceos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->unique();
            $table->string('slug')->unique();
            $table->enum('designation', ["Secretary & CEO, ICSB", "Past Secretary & CEO, ICSB"])->default("Secretary & CEO, ICSB");
            $table->longText('bio');
            $table->longText('message');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('sec_and_ceos');
    }
};
