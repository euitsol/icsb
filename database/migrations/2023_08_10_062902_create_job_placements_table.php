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
        Schema::create('job_placements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->string('company_url');
            $table->string('email');
            $table->enum('job_type',["Full-Time", "Part-Time","Work From Home", "Contractual","Intern"]);
            $table->json('salary');
            $table->enum('salary_type',["Per Month", "Per Year"]);
            $table->dateTime('deadline');
            $table->longText('job_responsibility');
            $table->longText('additional_requirement');
            $table->longText('job_location');
            $table->longText('other_benefits');
            $table->longText('special_instractions');
            $table->string('educational_requirement')->nullable();
            $table->string('professional_requirement');
            $table->float('experience_requirement');
            $table->float('age_requirement');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down(): void
    {
         Schema::dropIfExists('job_placements');
    }
};
