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
        Schema::create('issues', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('status', ['open', 'in_progress', 'resolved']);
        $table->enum('priority', ['low', 'medium', 'high']);
        $table->unsignedBigInteger('assigned_to')->nullable();
        $table->unsignedBigInteger('created_by');
        $table->foreign('assigned_to')->references('id')->on('users');
        $table->foreign('created_by')->references('id')->on('users');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
