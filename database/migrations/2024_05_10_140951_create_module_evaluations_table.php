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
        Schema::create('module_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modelinfo_id');

            $table->string('evaluation');
            $table->string('number_time');
            $table->integer('weight_mark');
            $table->string('week_due');
            $table->text('relevant_learning_outcome');
            $table->foreign('modelinfo_id')->references('id')->on('modelinfos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_evaluations');
    }
};
