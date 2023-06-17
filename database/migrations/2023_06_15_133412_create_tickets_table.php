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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text('subject');
            $table->longText('content');
            $table->longText('html')->nullable();
            $table->foreignId('status_id')
                ->references('id')
                ->on('ticket_statuses')
                ->cascadeOnUpdate();

            $table->foreignId('priority_id')
                ->references('id')
                ->on('ticket_priorities')
                ->cascadeOnUpdate();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('agent_id')
                ->references('id')
                ->on('users');

            $table->foreignId('category_id')
                ->references('id')
                ->on('ticket_categories_users');

            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
