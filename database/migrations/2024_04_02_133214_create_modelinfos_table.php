<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modelinfos', function (Blueprint $table) {
            $table->id();
            $table->string('module_title');
            $table->integer('module_type');
            $table->string('module_code');
            $table->integer('credits');
            $table->string('module_level');
            $table->integer('semester_of_delivery');
            $table->string('administering_department');
            $table->string('faculty');
            $table->string('module_leader');
            $table->string('module_leader_email');
            $table->string('module_leader_academic_title');
            $table->string('module_leader_qualification');
            $table->string('module_tutor_name')->nullable();
            $table->string('module_tutor_email')->nullable();
            $table->string('peer_reviewer_name')->nullable();
            $table->string('peer_reviewer_email')->nullable();
            $table->date('approval_date');
            $table->string('version_number')->nullable();
            $table->string('pre_requisites ')->nullable();
            $table->string('co_requisites ')->nullable();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('stage_id');

            $table->timestamps();
            $table->foreign("subject_id")->references("id")->on("subjects")->onDelete('cascade');
            $table->foreign("stage_id")->references("id")->on("stages")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelinfos');
    }
};
