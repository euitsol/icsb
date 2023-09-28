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
        Schema::create('council_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_key')->unique();
            $table->unsignedBigInteger('council_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('cmt_id');
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cmt_id')->references('id')->on('council_member_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('council_members');
    }
};
