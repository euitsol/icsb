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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();;
            $table->unsignedBigInteger('member_type')->nullable();
            $table->string('designation');
            $table->string('image')->nullable();
            $table->json('phone')->nullable();
            $table->string('address')->nullable();
            $table->longText('details')->nullable();
            $table->longText('company_name')->nullable();
            $table->boolean('status')->default(1);

            $table->string('member_id')->nullable();
            $table->string('membership_id')->nullable();
            $table->string('mem_current_status')->nullable();
            $table->string('honorary')->nullable();
            $table->string('type')->nullable();

            $table->boolean('notify_email')->default(1);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);


            // $table->foreign('member_type')->references('id')->on('member_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('members');
    }
};
