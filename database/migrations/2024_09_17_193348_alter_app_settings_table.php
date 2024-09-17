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
        Schema::create('settings', function (Blueprint $table) {
            $table->string('site_title');
            $table->string('time_zone');
            $table->boolean('force_ssl');
            $table->string('currency');
            $table->string('currency_symbol');
            $table->string('theme');
            $table->integer('fraction_number');
            $table->integer('paginate');
            $table->boolean('error_log');
            $table->boolean('strong_password');
            $table->boolean('registration');
            $table->string('sender_email');
            $table->string('sender_email_name');
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
