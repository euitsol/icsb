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
            $table->enum('category',["Company Secretary","HR Jobs","Other Jobs"]);
            $table->string('application_url')->nullable();
            $table->string('email');
            $table->enum('job_type',["Full-Time", "Part-Time","Work From Home", "Contractual","Intern"]);
            $table->json('salary')->nullable();
            $table->enum('salary_type',["Per Month", "Per Year","Negotiable"]);
            $table->date('deadline');

            $table->integer('vacancy');
            $table->longText('company_address');
            $table->longText('job_responsibility');
            $table->longText('additional_requirement')->nullable();
            $table->longText('job_location');
            $table->longText('other_benefits')->nullable();
            $table->longText('special_instractions')->nullable();
            $table->string('educational_requirement')->nullable();
            $table->string('professional_requirement')->nullable();
            $table->string('experience_requirement')->nullable();
            $table->string('age_requirement')->nullable();
            $table->enum('status',["-1","0", "1","2"])->default(0);


            $table->integer('notify')->default(1);
            $table->longText('email_subject')->nullable();
            $table->longText('email_body')->nullable();

            $table->longText('sms_body')->nullable();
            
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
