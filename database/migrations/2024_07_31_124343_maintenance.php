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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('change_name');
            $table->integer('ticket_number');
            $table->string('requested_by');
            $table->string('contact');
            $table->date('date');
            $table->string('reason');
            $table->string('technician');
            $table->date('estimated_start');
            $table->date('estimated_finish');
            $table->string('duration');
            $table->string('list_task');
            $table->string('cost');
            $table->string('date_needed');
            $table->string('approval_requester');
            $table->string('approval_manager');
            $table->date('approval_date');
            $table->string('last_interactor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};
