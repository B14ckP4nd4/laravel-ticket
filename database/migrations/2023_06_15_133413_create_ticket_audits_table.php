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
        Schema::create('ticket_audits', function (Blueprint $table) {
            $table->id();
            $table->longText('operation');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('ticket_id')
                ->references('id')
                ->on('tickets');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_audits');
    }
};
